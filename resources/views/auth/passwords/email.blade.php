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

        @if (session('status'))
            <div class="alert alert-success" style="text-align:center;" role="alert">
               <h1 class="donation__card--heading-4 ">{{ session('status') }}</h1> 
            </div>
        @endif

    <div class="login__form--wrapper">
        <form method="POST" action="{{ route('password.email') }}"  class="login__form"">
            @csrf

            <label for="email" class="login__label">{{ __('E-Mail Address') }}</label>
            <input id="email" type="email" class="u-margin-bottom-medium login__input form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            <button type="submit" class="login__button u-margin-bottom-big">
                {{ __('Send Password Reset Link') }}
            </button>
        </form>
    </div>

</div>

<img class="vriend__bottom-illustration" src="/img/bg-illustrations/bg-illustration-3.svg" alt="A desert scenery with dark purple and orange colors and some people biking">


</section>
@endsection

