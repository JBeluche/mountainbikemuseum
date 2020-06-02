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
            {{ __('auth.text_7b') }} <br>
            {{ __('auth.text_7c') }}
            <a href="/checkout/payment-options"> {{ __('auth.text_7d') }}.</a>
            @elseif(Session::get('product')->is_subscription === "1")
                {{ __('auth.text_8') }}<br />
                {{ __('auth.text_9') }}<br>
            @endif
           
        </p>

        <form method="POST" action="/checkout/register" class="main-form u-margin-bottom-medium">
            @csrf
            {{--Naam--}}
            <div class="main-form__item-row-col--1-full">
                <label for="name" class="main-form__label">{{ __('main.contact_name') }}</label>
                <input id="name" type="text" class="main-form__input @error('name') is-invalid @enderror" name="name"
                placeholder="Naam" required autocomplete="name" autofocus><br>
            </div>

            {{--Type klant--}}
            <div class="main-form__item-row-col--2-left main-form__dropdown">
                <label class="main-form__label" for="type_customer">{{ __('reserveren_2.form_item_5a') }}</label>
                    <select>
                        <option>{{ __('reserveren_2.form_item_5b') }}</option>
                        <option>{{ __('reserveren_2.form_item_5c') }}</option>
                    </select>
            </div>

            {{--Bedrijfsnaam--}}
            <div class="main-form__item-row-col--2-right">
                <label class="main-form__label" for="company-name">{{ __('reserveren_2.form_item_5d') }}</label>
                <input type="text" placeholder="Bedrijfsnaam" class="main-form__input main-form__input--small">
            </div>

            {{--Email--}}
            <div class="main-form__item-row-col--3-full">
                <label for="email" class="main-form__label">{{ __('reserveren_2.form_item_8') }}</label>
                <input id="email" type="email" class="main-form__input @error('email') is-invalid @enderror"
                    name="email" required autocomplete="email" placeholder="{{ __('reserveren_2.form_item_8') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            {{--Password--}}
            <div class="main-form__item-row-col--4-left">
                <label for="password" class="main-form__label">{{ __('auth.password_label') }}</label> 
                <input id="password" type="password" 
                    class="main-form__input main-form__input--small @error('password') is-invalid @enderror" name="password" required
                    autocomplete="current-password" placeholder="{{ __('auth.password_label') }}">
            </div>

            {{--Password again--}}
            <div class="main-form__item-row-col--4-right">
                <label for="password-confirm" class="main-form__label">{{ __('auth.confirm_password') }}</label> 
                <input id="password-confirm" type="password" class="main-form__input  main-form__input--small"
                    name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('auth.password_label') }}">
            </div>

            <hr class="main-form__line main-form__line--full">

            <div class="main-form__item-row-col--6-full main-form__centered">
                <button type="submit" class="main-form__button">
                    {{ __('auth.register') }}
                </button>
            </div>
         
        </form>

            <p class="paragraph-semibold-16__light checkout__bottom-question">{{ __('auth.account_already') }}<br><br></p>
            <a class="paragraph-semibold-16__light checkout__bottom-link" href="/checkout/login">{{ __('auth.login_here') }}</a>


    </div>




</section>
@endsection