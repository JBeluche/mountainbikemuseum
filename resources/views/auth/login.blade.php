@extends('layouts.main')

@section('content')

<section    class="illustration-section"  
title="A desert scenery with dark purple and orange colors and some people biking"
style=" background: rgb(255,136,74);
        background: linear-gradient(0deg, rgba(255,136,74,1) 0%, rgba(255,76,109,1) 18%, 
        rgba(255,53,124,1) 22%, rgba(224,43,115,1) 26%, rgba(184,29,103,1) 35%, rgba(151,19,93,1) 44%, 
        rgba(125,10,86,1) 56%, rgba(107,4,81,1) 67%, rgba(96,1,78,1) 79%, rgba(93,0,77,1) 89%, rgba(93,0,77,1) 100%); 
        min-height: 100vh;
        padding: 20rem 0;
        background-position: center;">




    <div class="login__container">

    <h1 class=" login__title">{{ __('auth.login') }}</h1>
    @include('layouts.notification-bar')
    <div class="login__form--wrapper">
        <form method="POST" action="{{ route('login') }}"  class="login__form"">
                @csrf
            <label for="email" class="login__label">{{ __('auth.email_label') }}</label><br>
            <input id="email" type="email" class="u-margin-bottom-medium form-control login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><br>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <label for="password" class="login__label">{{ __('auth.password_label') }}</label>    <br>      
            <input id="password" type="password" class="u-margin-bottom-medium login__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>
            <button class="login__button u-margin-bottom-big">{{ __('auth.login') }}</button>
        </form>
    </div>

            <p class="u-margin-bottom-small login__to-register">Wachtwoord vergeten?<a href="/password/reset"> Klik hier?</a></p>
            <p class="login__to-register">{{ __('auth.account_already') }}<a href="/register">{{ __('auth.register_here') }}</a></p>
</div>

<img class="vriend__bottom-illustration" src="/img/bg-illustrations/bg-illustration-3.svg" alt="A desert scenery with dark purple and orange colors and some people biking">


</section>
@endsection
