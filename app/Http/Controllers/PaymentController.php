<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Resolvers\PaymentPlatformResolver;
use App\Product;
use App\Subscription;
use Auth;

class PaymentController extends Controller
{
    protected $paymentPlatformResolver;
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PaymentPlatformResolver $paymentPlatformResolver)
    {
        

        $this->paymentPlatformResolver = $paymentPlatformResolver;
    }

    /**
     * Obtain a payment details
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function pay(Request $request)
    {

        $rules = [
            'payment_platform' => ['required', 'exists:payment_platforms,id'],
        ];

        $request->validate($rules);
        
        $paymentPlatform = $this->paymentPlatformResolver
        ->resolveService($request->payment_platform);

        session()->put('paymentPlatformId', $request->payment_platform);
 
        return $paymentPlatform->handlePayment();

        return $request->all();
        
    }

    public function approveSubscription(){
        if (session()->has('paymentPlatformId')){
            $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handldeSubscription();
        }

        return redirect()
        ->route('dashboard')
        ->withErrors(__('notifications.payment_controller_1'));
    }

    public function approval()
    {
        if (session()->has('paymentPlatformId')){
            $paymentPlatform = $this->paymentPlatformResolver
            ->resolveService(session()->get('paymentPlatformId'));

            return $paymentPlatform->handleApproval();
        }
        else{
            return redirect()
            ->route('dashboard')
            ->withErrors(__('notifications.payment_controller_1'));
        }

       
    }

    public function cancelSubscription(Subscription $subscription){

        if(Auth::user()){
         
                $paymentPlatform = $this->paymentPlatformResolver
                ->resolveService($subscription->payment_platform_id);
    
                return $paymentPlatform->deleteSubscription($subscription);
    
        }
        
        return redirect()
        ->route('home')
        ->withErrors(__('notifications.payment_controller_2'));

    }

    public function cancelled()
    {
        return redirect()
                ->route('dashboard')
                ->withErrors(__('notifications.payment_controller_3'));
        
    }
}
