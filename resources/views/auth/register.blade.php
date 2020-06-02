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



<div    class="login__container"
        style=" max-width: 50rem;">

    <h1 class=" login__title">{{ __('auth.register') }}</h1>
@include('layouts.notification-bar')
<div class="login__form--wrapper">
        <form method="POST" action="{{ route('register') }}" class="login__form">
            @csrf
            <label for="name" class="login__label">{{ __('auth.name') }}</label>
            <input id="name" type="text" class="u-margin-bottom-medium form-control login__input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus><br>

            <label for="email" class="login__label">{{ __('auth.email_label') }}</label><br>
            <input id="email" type="email" class="u-margin-bottom-medium form-control login__input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            <label for="password" class="login__label">{{ __('auth.password_label') }}</label>   <br>    
            <input id="password" type="password" class="u-margin-bottom-medium login__input form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><br>

            <label for="password-confirm" class="login__label">{{ __('auth.confirm_password') }}</label>    <br>     
            <input id="password-confirm" type="password" class="u-margin-bottom-medium login__input form-control" name="password_confirmation" required autocomplete="new-password">
           
            <button type="submit"  class="login__button u-margin-bottom-big">
                    {{ __('auth.register') }}
                </button>
        </form>

    </div>

            <p class="login__to-register">{{ __('auth.account_already') }}<a href="/login">{{ __('auth.login_here') }}</a></p>
</div>

<img class="vriend__bottom-illustration" src="/img/bg-illustrations/bg-illustration-3.svg" alt="A desert scenery with dark purple and orange colors and some people biking">

</section>
@endsection