@extends('layouts.main')

@section('page-title', 'Betaling')
@section('content')

<section class="checkout-register__section">

        @if( Auth::check() or Session::get('product')->is_subscription === "0")

    {{--@include('layouts.notification-bar')--}}

    <div class="checkout-register__container">

        <h1 class="heading-1 u-margin-bottom-medium-big">{{ __('auth.checkout_title') }}</h1>

        <h3 class="heading-4 u-margin-bottom-small">{{ __('auth.text_1') }}</h3>
        <p class="paragraph-regular__light u-margin-bottom-medium">
            {{ Session::get('product')->description }}<br />
            {{ Session::get('product')->price != 0 ? Session::get('product')->price . ".00" : Session::get('price') . ".00"}} &euro; 
            @if(Session::get('product')->is_subscription === "1")
                @if(Session::get('product')->interval_count === "12")
                {{ __('auth.text_2') }}
                @elseif(Session::get('product')->interval_count === "1")
                {{ __('auth.text_3') }}
                @elseif(Session::get('product')->interval_count  > "1")
                {{ __('auth.text_5') }}{{Session::get('product')->interval_count}}{{ __('auth.text_4') }}
                @endif
            @else
                <br>{{ __('auth.text_6') }}
            @endif
        </p> 

        
        
        <h3 class="heading-4 u-margin-bottom-medium">{{ __('auth.text_10') }}</h3>

        <div class="payment-options__button-wrapper">

            @foreach (Session::get('paymentPlatforms') as $paymentPlatform)            

                <div class="payment-options__buttons">
                    <form action="/payment/pay" method="POST" id="paymentForm" class="payment__form">
                        @csrf
                        <input  type="hidden" 
                        name="product_id"
                        value="{{Session::get('product')->id}}">

                        <input  type="hidden" 
                                name="payment_platform"
                                value="{{$paymentPlatform->id}}">

                        {{--The submit button--}}
                        <button type="submit"> 
                            <img src="{{$paymentPlatform->image}}" alt="Image of the payment platform">
                        </button>            

                    </form>
                </div>
            @endforeach
        </div>
    </div>

    @else

        <h1 class="heading-1">{{ __('auth.no_correct_login') }}</h1>

    @endif

</section>
@endsection