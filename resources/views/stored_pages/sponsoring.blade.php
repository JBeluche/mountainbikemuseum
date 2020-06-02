@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent
    <header class="header-lint" style="background-image: url(img/MTBmuseum08-coen-de-jongh.jpg)">

        <div class="header-lint__lint">
            <h1 class="heading-1  u-margin-bottom-medium">{{ __('sponsoring.header_title') }}</h1>
            <p class="paragraph-big__light header-lint__text">{{ __('sponsoring.header_text_1') }}
                <br>
                {{ __('sponsoring.header_text_2') }}
                    </p>
        </div>

        </header>

    @include('components.retro-bar-thick')

    <section    class="illustration-section"  
    title="A beautiful light and dark blue background of two person riding a bike on a hill"
    style=" background-image: url(img/bg-illustrations/bg-illustration-1.svg);                             
            background-color: #A2EBFE;
            padding-bottom: 30rem;">

        
    <div class="centered-text centered-text">
        <h1 class="heading-5 u-margin-bottom-medium u-margin-bottom-medium">{{ __('sponsoring.yearly_title') }}</h1>
        <p>{{ __('sponsoring.yearly_text') }}</p>
    </div>


    <div    class="long-card__wrapper">        

        {{--SILVER--}}
        <div class="long-card long-card__card-1 dropshadow-4">

            <div class="long-card__gradient-decoration long-card__gradient-decoration--top long-card__gradient-decoration--purple dropshadow-4"></div>

            <h1 class="long-card__title">{{ __('sponsoring.silver_title') }}</h1>

            <div class="long-card__fold long-card__fold--purple dropshadow-4">
                    <p class="long-card__price paragraph-big__light ">{{ __('sponsoring.silver_price') }}</p>
                </div>

                <ul class="long-card__list">    
                    <li>{{ __('sponsoring.product_one') }}</li>
                    <li><hr class="long-card__hr long-card__hr--purple"></li>
                    <li>{{ __('sponsoring.product_two') }}</li>
                    <li><hr class="long-card__hr long-card__hr--purple"></li>
                    <li>{{ __('sponsoring.product_three') }}</li>
                </ul>
                <form class="long-card__form" method="POST" action="/checkout/auth" >
                    @csrf 
                    <input type="hidden" name="product_id" value="2">
                    <input type="hidden" name="page_title" value="{{ $page->name }}">
                    
                    <button class="long-card__button btn-gradient btn-gradient__purple paragraph-semibold-16__light dropshadow-4">{{ __('main.click_here') }}</button>
                </form>

            <div class="long-card__gradient-decoration long-card__gradient-decoration--bottom long-card__gradient-decoration--purple dropshadow-4"></div> 
        </div>

        
        {{--GOLD--}}
        <div class="long-card long-card__card-2 dropshadow-4">

            <div class="long-card__gradient-decoration long-card__gradient-decoration--top long-card__gradient-decoration--pink dropshadow-4"></div>

            <h1 class="long-card__title">{{ __('sponsoring.gold_title') }}</h1>

            <div class="long-card__fold long-card__fold--pink dropshadow-4">
                    <p class="long-card__price paragraph-big__light">{{ __('sponsoring.gold_price') }}</p>
                </div>

                <ul class="long-card__list">    
                    <li>{{ __('sponsoring.product_one') }}</li>
                    <li><hr class="long-card__hr long-card__hr--pink"></li>
                    <li>{{ __('sponsoring.product_two') }}</li>
                    <li><hr class="long-card__hr long-card__hr--pink"></li>
                    <li>{{ __('sponsoring.product_three') }}</li>
                    <li><hr class="long-card__hr long-card__hr--pink"></li>
                    <li>{{ __('sponsoring.product_four') }}</li>
                </ul>
                <form class="long-card__form" method="POST" action="/checkout/auth" >
                    @csrf 
                    <input type="hidden" name="product_id" value="3">
                    <input type="hidden" name="page_title" value="{{ $page->name }}">
                    
                    <button class="long-card__button btn-gradient btn-gradient__pink paragraph-semibold-16__light dropshadow-4">{{ __('main.click_here') }}</button>
                </form>

            <div class="long-card__gradient-decoration long-card__gradient-decoration--bottom long-card__gradient-decoration--pink dropshadow-4"></div> 
        </div>

        {{--Platinum--}}
        <div class="long-card long-card__card-3 dropshadow-4">

            <div class="long-card__gradient-decoration long-card__gradient-decoration--top long-card__gradient-decoration--orange dropshadow-4"></div>

            <h1 class="long-card__title">{{ __('sponsoring.platinum_title') }}</h1>

            <div class="long-card__fold long-card__fold--orange dropshadow-4">
                    <p class="long-card__price paragraph-big__light">{{ __('sponsoring.platinum_price') }}</p>
                </div>

                <ul class="long-card__list">    
                    <li>{{ __('sponsoring.product_one') }}</li>
                    <li><hr class="long-card__hr long-card__hr--orange"></li>
                    <li>{{ __('sponsoring.product_two') }}</li>
                    <li><hr class="long-card__hr long-card__hr--orange"></li>
                    <li>{{ __('sponsoring.product_three') }}</li>
                    <li><hr class="long-card__hr long-card__hr--orange"></li>
                    <li>{{ __('sponsoring.product_four') }}</li>
                    <li><hr class="long-card__hr long-card__hr--orange"></li>
                    <li>{{ __('sponsoring.product_five') }}</li>
                </ul>
                <form class="long-card__form" method="POST" action="/checkout/auth" >
                    @csrf 
                    <input type="hidden" name="product_id" value="4">
                    <input type="hidden" name="page_title" value="{{ $page->name }}">
                    
                    <button class="long-card__button btn-gradient btn-gradient__orange paragraph-semibold-16__light dropshadow-4">{{ __('main.click_here') }}</button>
                </form>

            <div class="long-card__gradient-decoration long-card__gradient-decoration--bottom long-card__gradient-decoration--orange dropshadow-4"></div> 
        </div>
    </div>

    
    <div class="contact-form">

        <span class="dropshadow-5-filter">
        <div class="contact-form__left">
            <p class="contact-form__left--text paragraph-big__dark u-margin-bottom-medium">
                {{ __('sponsoring.form_text') }}</p>
            <hr class="contact-form__left--line u-margin-bottom-medium">
        </div>
    </span>
    <div class="contact-form__right contact-form__right--dark">
        <form  method="POST"action="/contact/mail"  class="contact-form__form">
            @csrf
            <h4 class="heading-4 u-margin-bottom-small">{{ __('main.contact_intro') }}</h4>
            <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_name') }}</p>
            <input class="input-field-base u-margin-bottom-small" required type="text" name='name' placeholder="{{ __('main.contact_name_placeholder') }}">
            <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_mail') }}</p>
            <input class="input-field-base u-margin-bottom-small" required type="email" name='email' placeholder="{{ __('main.contact_mail_placeholder') }}">
            <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_msg') }}</p>
            <input type="hidden" name="page" value="main">
            <textarea class="input-field-base input-field__long-text u-margin-bottom-medium" required name='message'  placeholder="{{ __('main.contact_msg_placeholder') }}"></textarea>
            <button type="submit" class="btn-pink">{{ __('main.contact_send') }}</button>
        </form>
    </div>
    
    </div>

    @include('components.retro-bar-thick')

    <div class="centered-text">
        <h1 class="heading-5 u-margin-bottom-medium">{{ __('sponsoring.natura_title') }}</h1>
        <p>{{ __('sponsoring.natura_text_1') }}<a href="/Vrijwilliger">{{ __('sponsoring.natura_text_2') }}</a>.</p>
    </div>
    <div class="centered-text centered-text__no-top-bottom-padding">
        <h1 class="heading-5 u-margin-bottom-medium">{{ __('sponsoring.donation_title') }}</h1>
        <p>{{ __('sponsoring.donation_text_1') }}<a href="/donatie">{{ __('sponsoring.donation_text_2') }}</a>.</p>
    </div>
</section>
    @stop