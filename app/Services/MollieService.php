<?php

namespace App\Services;

use App\Payment;
use App\Product;
use App\Subscription;
use App\Traits\ConsumesExternalServices;
use App\User;
use Auth;
use \Session;
use \App;

class MollieService
{
    use ConsumesExternalServices;

    protected $baseUri;

    protected $key;

    protected $profile;

    protected $product;
    protected $user;

    public function __construct()
    {
        $this->baseUri = config('services.mollie.base_uri');
        $this->key = config('services.mollie.key');
        $this->profile = config('services.mollie.profile');
        if (Session::has('product')) {
            $product_id = Session::get('product')->id;
            $this->product = Product::where('id', $product_id)
                ->first();
        }
        $this->user = Auth::user();

    }

    public function resolveAuthorization(&$queryParams, &$formParams, &$headers)
    {
        $headers['Authorization'] = $this->resolveAccessToken();
    }

    public function decodeResponse($response)
    {
        return json_decode($response);
    }

    public function resolveAccessToken()
    {
        return "Bearer {$this->key}";
    }

    public function handlePayment()
    {

        //Check if the price should be changed
        if ($this->product->price === "0") {
            $this->product->price = Session::pull('price');
        }

        //Check if the user has a mollie id
        if (Auth::user() and $this->product->is_subscription === "1") {
            if ($this->user->mollie_id === null) {
                //Create customer if user has no mollie id
                $customer = $this->createCustomer($this->user);
                $this->user->mollie_id = $customer->id;
                $this->user->save();
            }
                //Check if the current Subscriptions is not already active for this user
                $user_subscriptions = Subscription::where([
                    ['user_id', '=', $this->user->id],
                    ['product_id', '=', $this->product->id]])
                    ->first();

                if ($user_subscriptions === null) {
                    //Create the first order
                    $order = $this->createOrder($this->product, $this->user, 'first');
                } else {
                    return redirect('home')
                        ->with('message', __('notifications.payment_services_1'));
                }

        } elseif(Auth::user()) {
            //Single payment
            $order = $this->createOrder($this->product, $this->user, 'oneoff');
        }
        else{
            $user = User::where('id', 2)
            ->first();
            $user->mollie_id = null;
            //Single payment
            $order = $this->createOrder($this->product, $user, 'oneoff');
        }

        session()->put('approvalId', $order->id);

        return redirect($order->_links->checkout->href);
    }

    public function handldeSubscription()
    {

        //Get the mandate
        $mandates = $this->getMandates($this->user);

        foreach ($mandates->_embedded->mandates as $mandate) {
            if ($mandate->status === 'valid') {
                //check if molly has not already the Subscriptions
                $subscription_list = $this->getSubscriptionList($this->user);

                //Create a Subscriptions
                $subscription_mollie = $this->createSubscription($this->user, $mandate, $this->product);

                $this->createPayment($subscription_mollie->id, $this->product->price .".00");

                //Set Subscriptions in datebase
                $subscription = new Subscription;

                $subscription->subscription_id = $subscription_mollie->id;
                $subscription->user_id = $this->user->id;
                $subscription->product_id = $this->product->id;
                $subscription->status = $subscription_mollie->status;
                $subscription->payment_platform_id = 4;

                $subscription->save();

                $this->forgetSessions();
                return redirect('dashboard')
                    ->with(['message' => __('notifications.payment_services_2')]);
            }

            return redirect('home')
                ->with('message', __('notifications.payment_services_3'));

        }
    }

    public function deleteSubscription($subscription)
    {

        if (Auth::user()) {

            $deletedSubscription = $this->cancleSubscription($subscription->subscription_id, $this->user->mollie_id);

            if ($deletedSubscription = "canceled") {
                Subscription::destroy($subscription->id);
                return redirect('dashboard')
                    ->with(['message' => __('notifications.payment_services_4')]);
            }

            return redirect('dashboard')
                ->with(['message' => __('notifications.payment_services_5')]);

        }

        return redirect('home')
            ->with(['message' => __('notifications.payment_services_6')]);
    }

    public function handleApproval()
    {

        if (session()->has('approvalId')) {
            $approvalId = session()->pull('approvalId');

            $payment = $this->checkPayment($approvalId);

            $description = $payment->description;
            $amount = $payment->amount->value;
            $currency = $payment->amount->currency;

            //Remove all sessions
            $this->forgetSessions();

            if (Auth::user()) {
                $payment->user_id = Auth::user()->id;
                $this->createPayment($approvalId, $amount);
                return redirect('dashboard')
                    ->with(['message' => __('notifications.payment_services_2')]);
            } else {
                $payment->user_id = 2;
                $this->createPayment($approvalId, $amount);

                return redirect('home')
                    ->with(['message' => __('notifications.payment_services_2')]);
            }
        }

        return redirect('dashboard')
            ->withErrors(__('notifications.payment_services_7'));
    }

    public function cancleSubscription($subscriptionId, $customerId)
    {

        return $this->makeRequest(
            "DELETE",
            "/v2/customers/{$customerId}/subscriptions/{$subscriptionId}"
        );
    }

    public function createOrder($product, $user, $sequenceType)
    {
        if ($product->is_subscription === "1") {
            return $this->makeRequest(
                'POST',
                '/v2/payments',
                [],
                [
                    'amount' => [
                        'currency' => $product->iso,
                        'value' => $product->price . '.00'
                    ],
                    'customerId' => $user->mollie_id,
                    'description' => $product->description,
                    'sequenceType' => $sequenceType,
                    'redirectUrl' => url('/payment/approval/' . $product->id)
                ],
                [],
                $isJsonRequest = true
            );
        } elseif ($product->is_subscription === "0") {
            return $this->makeRequest(
                'POST',
                '/v2/payments',
                [],
                [
                    'amount' => [
                        'currency' => $product->iso,
                        'value' => $product->price . '.00'
                    ],
                    'customerId' => $user->mollie_id,
                    'description' => $product->description,
                    'sequenceType' => $sequenceType,
                    'redirectUrl' => url('/payment/approval')
                ],
                [],
                $isJsonRequest = true
            );
        }

    }

    public function createCustomer($user)
    {

        return $this->makeRequest(
            'POST',
            '/v2/customers',
            [],
            [
                'name' => $user->name,
                'email' => $user->email
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function getMandates($user)
    {
        return $this->makeRequest(
            'GET',
            "/v2/customers/{$user->mollie_id}/mandates"
        );
    }

    public function createSubscription($user, $mandate, $product)
    {
        return $this->makeRequest(
            'POST',
            "/v2/customers/{$user->mollie_id}/subscriptions",
            [],
            [
                'amount' => [
                    'currency' => $product->iso,
                    'value' => $product->price . '.00'
                ],
                'interval' => $product->interval_count . ' months',
                'description' => $product->description,
                'mandateId' => $mandate->id
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function getSubscriptionList($user)
    {
        return $this->makeRequest(
            'GET',
            "/v2/customers/{$user->mollie_id}/subscriptions"
        );
    }

    public function checkPayment($orderId)
    {
        return $this->makeRequest(
            'GET',
            "/v2/payments/{$orderId}"
        );
    }

    public function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimalCurrencies)) {
            return 100;
        }

        return 1;
    }
    public function forgetSessions()
    {
        Session::forget('approvalId');
        Session::forget('price');
        Session::forget('product');
        Session::forget('paymentPage');
        Session::forget('paymentPlatformId');
    }

    public function createPayment($approvalId, $amount)
    {
        $payment = new Payment;

        if(Auth::user()){
            $payment->user_id = $this->user->id;
        }
        else{
            $payment->user_id = 2;
        }

        $payment->payment_id = $approvalId;
        $payment->product_id = $this->product->id;
        $payment->description = $this->product->description;
        $payment->price = $amount;
        $payment->is_subscription = $this->product->is_subscription;
        $payment->payment_platforms_id = 4;

        $payment->save();
    }

}
