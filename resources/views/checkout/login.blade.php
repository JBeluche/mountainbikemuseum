@extends('layouts.main')

@section('page-title', 'Authenticatie')
@section('content')

<section class="checkout-register__section">


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

        <p class="paragraph-semibold-16__light u-margin-bottom-medium">{{ __('auth.text_7') }}<br />
            
            @if(Session::get('product')->is_subscription === "0")
                U kunt bij ons registreren/inloggen, op dit manier kunt u uw transacties terug vinden en weten wij wie u bent. <br>
                Wilt u een eenmalig betaling doen zonder in te loggen? Klik dan <a href="/checkout/payment-options">hier</a>
            @elseif(Session::get('product')->is_subscription === "1")
                {{ __('auth.text_8') }}<br>
                {{ __('auth.text_9') }}<br>
            @endif
           
        </p>
        <form method="POST" action="/checkout/login" class="main-form checkout__login-form u-margin-bottom-medium">
            @csrf
            
            {{--Email--}}
            <div class="main-form__item-row-col--1-full">
                <label for="email" class="main-form__label">{{ __('E-Mail Address') }}</label>
                <input placeholder="Email" id="email" type="email" class="main-form__input @error('email') is-invalid @enderror"
                    name="email" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{--Password--}}
            <div class="main-form__item-row-col--2-full">
                <label for="password" class="main-form__label">{{ __('Password') }}</label> 
                <input placeholder="Wachtwoord" id="password" type="password" name="password"
                    class="main-form__input main-form__input @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password">
            </div>           

            <hr class="main-form__line main-form__line--full">

            <div class="main-form__item-row-col--3-full main-form__centered">
                <button type="submit" class="main-form__button">
                    {{ __('Login') }}
                </button>
            </div>


         
        </form>

        

        <p class="paragraph-semibold-16__light checkout__bottom-question">{{ __('auth.no_account') }}<br><br></p>
        <a class="paragraph-semibold-16__light checkout__bottom-link" href="/checkout/register">{{ __('auth.register_here') }}</a>





    </div>




</section>
@endsection