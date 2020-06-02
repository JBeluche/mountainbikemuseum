<?php

namespace App\Services;

use App\Payment;
use App\Product;
use App\Subscription;
use App\Traits\ConsumesExternalServices;
use App\User;
use Auth;
use \Session;

class PayPalService
{
    use ConsumesExternalServices;

    protected $baseUri;
    protected $clientId;
    protected $clientSecret;
    protected $product;
    protected $user;

    public function __construct()
    {
        $this->baseUri = config('services.paypal.base_uri');
        $this->clientId = config('services.paypal.client_id');
        $this->clientSecret = config('services.paypal.client_secret');
        if (Session::has('product')) {
            $product_id = Session::get('product')->id;
            $this->product = Product::where('id', $product_id)
                ->first();
            if ($this->product->price === "0") {
                $this->product->price = Session::get('price');
            }
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
        $credentials = base64_encode("{$this->clientId}:{$this->clientSecret}");
        return "Basic {$credentials}";
    }

    public function handlePayment()
    {
        if(Auth::user() and $this->product->is_subscription === "1")
            {

                $user_subscriptions = Subscription::where([
                    ['user_id', '=', $this->user->id],
                    ['product_id', '=', $this->product->id]])
                    ->first();

            if ($user_subscriptions === null) {
                //First paypal wants to create a product
                $orderProduct = $this->createProduct($this->product);

                //Then you need to create a plan for it
                $plan = $this->createPlan($orderProduct, $this->product);

                //Then you need to create the subscription
                $subscription = $this->createSubscription($plan);

                $subscriptionOrder = collect($subscription->links);
                //Need to pay
                $approve = $subscriptionOrder->where('rel', 'approve')->first();

                session()->put('approvalId', $subscription->id);
            } else {
                return redirect('home')
                    ->with('message', __('notifications.payment_services_1'));
            }

        } else{
            if(Auth::user()){
                $order = $this->createOrder($this->product->price, $this->product->iso, Auth::user()->paypal_id);

            }else{
                $order = $this->createOrder($this->product->price, $this->product->iso, NULL);
            }

            $orderLinks = collect($order->links);
            session()->put('approvalId', $order->id);
            $approve = $orderLinks->where('rel', 'approve')->first();
        }
     

        return redirect($approve->href);
        
    }

    public function handleApproval()
    {
        if (session()->has('approvalId')) {
            $approvalId = session()->get('approvalId');

            //Add the subscription to the database
            if ($this->product->is_subscription === "1" and Auth::user()) {
                $capturedSubscription = $this->getSubscriptionInfo($approvalId);

                $this->createPayment($capturedSubscription->id, $this->product->price);

                if ($capturedSubscription->status === 'ACTIVE') {
                    $subscription = new Subscription;
                    $subscription->subscription_id = $approvalId;
                    $subscription->user_id = Auth::user()->id;
                    $subscription->product_id = $this->product->id;
                    $subscription->status = $capturedSubscription->status;
                    $subscription->payment_platform_id = 1;

                    $subscription->save();

                    $this->forgetSessions();
                    return redirect('dashboard')
                        ->with(['message' => __('notifications.payment_services_2')]);
                } else {
                    $name = Auth::user()->name;
                    return redirect('home')
                        ->withErrors(['message' => __('notifications.payment_services_3')]);
                }
            }

            //Capture single payments
            if ($this->product->is_subscription === "0") {
                $captured_payment = $this->capturePayment($approvalId);

                if ($captured_payment->status === 'COMPLETED') {
                    if (Auth::user()) {
                        //If the user has no papal id, he should get one right now. !! CAN ONLY BE DONE WITH SINGLE PAYMENTS
                        if (Auth::user()->paypal_id === null) {
                            Auth::user()->paypal_id = $captured_payment->payer->payer_id;
                            Auth::user()->save();
                        }
                        $this->createPayment($approvalId, $this->product->price);
                        $this->forgetSessions();
                        return redirect('dashboard')
                            ->with(['message' => __('notifications.payment_services_2')]);

                    } else {
                        $this->createPayment($approvalId, $this->product->price);
                        $this->forgetSessions();
                        return redirect('home')
                            ->with(['message' => __('notifications.payment_services_2')]);

                    }
                }
            }

        }
        return redirect('home')
            ->withErrors(['message' => __('notifications.payment_services_3')]);
    }

    public function deleteSubscription($subscription){
        if (Auth::user()) {

            $deletedSubscription = $this->cancleSubscription($subscription->subscription_id);

            if ($deletedSubscription = "canceled") {
                Subscription::destroy($subscription->id);
                return redirect('dashboard')
                    ->with(['message' => __('notifications.payment_services_4')]);
            }

            return redirect('dashboard')
                ->with(['message' => __('notifications.payment_services_3')]);

        }

        return redirect('home')
            ->with(['message' => __('notifications.payment_services_6')]);
    
    }

    public function cancleSubscription($subscription_id)
    {
        return $this->makeRequest(
            "POST",
            "/v1/billing/subscriptions/{$subscription_id}/cancel",
            [],
            [],
            [
                'Content-Type' => 'application/json',
            ]
        );
    }

    public function createOrder($value, $currency, $paypal_id)
    {

        if ($paypal_id === null) {
            $paypal_id_array = '';
        } else {
            $paypal_id_array = array(
                'payer' => [
                    'payer_id' => $paypal_id,
                ]);
        }

        return $this->makeRequest(
            'POST',
            '/v2/checkout/orders',
            [],
            [
                'intent' => 'CAPTURE',
                $paypal_id_array,
                'purchase_units' => [
                    0 => [
                        'amount' => [
                            'currency_code' => strtoupper($currency),
                            'value' => round($value * $factor = $this->
                                    resolveFactor($currency)) / $factor
                        ],
                    ],
                ],
                'application_context' => [
                    'brand_name' => config('app.name'),
                    'shipping_preference' => 'NO_SHIPPING',
                    'user_action' => 'PAY_NOW',
                    'return_url' => route('approval'),
                    'cancel_url' => route('cancelled')
                ],
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function capturePayment($approvalID)
    {
        return $this->makeRequest(
            'POST',
            "/v2/checkout/orders/{$approvalID}/capture",
            [],
            [],
            [
                'Content-Type' => 'application/json',
            ]
        );
    }

    public function createProduct($product)
    {
        return $this->makeRequest(
            'POST',
            "/v1/catalogs/products",
            [],
            [
                'name' => $product->name,
                'description' => $product->description,
                'type' => 'SERVICE',
                'category' => 'SPORTS_AND_RECREATION'
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function createPlan($orderProduct, $product)
    {

        return $this->makeRequest(
            'POST',
            "/v1/billing/plans",
            [],
            [
                "product_id" => $orderProduct->id,
                "name" => $orderProduct->name,
                "description" => $orderProduct->description,
                "billing_cycles" => [
                    [
                        "frequency" => [
                            "interval_unit" => "MONTH",
                            "interval_count" => $product->interval_count
                        ],
                        "tenure_type" => "REGULAR",
                        "sequence" => 1,
                        "total_cycles" => 0,
                        "pricing_scheme" => [
                            "fixed_price" => [
                                "value" => $product->price,
                                "currency_code" => "USD"
                            ]
                        ]
                    ]
                ],
                "payment_preferences" => [
                    "setup_fee" => [
                        "value" => "0",
                        "currency_code" => "USD"
                    ]
                ]
                    ],

            [],
            $isJsonRequest = true

        );
    }

    public function createSubscription($plan)
    {

        return $this->makeRequest(
            'POST',
            "/v1/billing/subscriptions",
            [],
            [
                'plan_id' => $plan->id,
                'application_context' => [
                    'return_url' => url('/payment/approval'),
                    'cancel_url' => url('/payment/cancelled')
                ],
            ],
            [],
            $isJsonRequest = true

        );

    }

    public function getSubscriptionInfo($subscription_id)
    {
        return $this->makeRequest(
            'GET',
            "/v1/billing/subscriptions/{$subscription_id}",
            [],
            [],
            [],
            $isJsonRequest = true
        );
    }

    public function captureSubscription($subscription_id)
    {
        return $this->makeRequest(
            'POST',
            "/v1/billing/subscriptions/{$subscription_id}/capture",
            [],
            [
                "note" => "Charging as the balance reached the limit",
                "capture_type" => "OUTSTANDING_BALANCE",
                "amount" => [
                    "currency_code" => "USD",
                    "value" => "100"
                ]
            ],
            [],
            $isJsonRequest = true
        );
    }

    public function resolveFactor($currency)
    {
        $zeroDecimalCurrencies = ['JPY'];

        if (in_array(strtoupper($currency), $zeroDecimalCurrencies)) {
            return 1;
        }

        return 100;
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
        //Put payment in database
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
        $payment->price = $amount . ".00";
        $payment->is_subscription = $this->product->is_subscription;
        $payment->payment_platforms_id = 1;

        $payment->save();
    }

}
