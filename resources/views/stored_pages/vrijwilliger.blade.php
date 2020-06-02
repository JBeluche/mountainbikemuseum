@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent
    <header class="header-lint" style="background-image: url(img/MTBmuseum08-coen-de-jongh.jpg)">

        <div class="header-lint__lint">
            <h1 class="heading-1  u-margin-bottom-medium-big">{{ __('vrijwilliger.header_title') }}</h1>
            <p class="paragraph-big__light header-lint__text">
                {{ __('vrijwilliger.header_text_1') }}<i> <b> <a href="/sponsoring">{{ __('vrijwilliger.header_text_2') }}</a></b></i>, <i> <b> <a href="/Donatie">{{ __('vrijwilliger.header_text_3') }}</a></b></i>{{ __('vrijwilliger.header_text_4') }}
                <br>
                {{ __('vrijwilliger.header_text_5') }}<br>
                {{ __('vrijwilliger.header_text_6') }}<br>
                    </p>
        </div>

        </header>

    @include('components.retro-bar-thick')

    <section    class="illustration-section donation__section"  
                style=" background: rgb(0,161,237);
                        background: linear-gradient(180deg, rgba(0,161,237,1) 0%, rgba(86,192,243,1) 20%, rgba(179,227,249,1) 50%, rgba(212,239,252,1) 75%, rgba(255,255,255,1) 100%);
                        padding-bottom: 30rem;">

                        <div class="illustration-section__sticky-top-illustration"">
                            <img src="img/bg-illustrations/bg-illustration-9.svg" alt="Image of the sun and clouds">
                        </div>


                        <div class="donation__card vrijwiliger dropshadow-5">

                            <img src="img/svg/retro-bar-4.svg" alt="A colorfull border" class="donation__card--retro-border">   

                            <div class="donation__card--wrapper vrijwiliger__card-wrapper">

                               <p class="paragraph-big__dark u-margin-bottom-medium">
                                    {{ __('vrijwilliger.text_1') }}
                                </p>
                                <p class="paragraph-regular__dark u-margin-bottom-small">{{ __('vrijwilliger.text_2') }}</p> 
                                <ul class="u-margin-bottom-small">
                                    <li class="paragraph-regular__dark">{{ __('vrijwilliger.text_3') }}</li>
                                    <li class="paragraph-regular__dark">{{ __('vrijwilliger.text_4') }}</li>
                                    <li class="paragraph-regular__dark">{{ __('vrijwilliger.text_5') }}</li>
                                </ul>

                               <p class="paragraph-regular__dark u-margin-bottom-small">{{ __('vrijwilliger.text_6') }}</p> 
                                <p class="paragraph-regular__dark u-margin-bottom-small">{{ __('vrijwilliger.text_7') }}</p>
                                <ul class="u-margin-bottom-small">
                                    <li class="paragraph-regular__dark"><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('vrijwilliger.text_8') }}</span></li>
                                    <li class="paragraph-regular__dark"><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('vrijwilliger.text_9') }}</span></li>
                                    <li class="paragraph-regular__dark"><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('vrijwilliger.text_10') }}</span></li>
                                    <li class="paragraph-regular__dark"><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('vrijwilliger.text_11') }}</span></li>
                                    <li class="paragraph-regular__dark"><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('vrijwilliger.text_12') }}</span></li>
                                </ul>
                                <p class="paragraph-regular__dark u-margin-bottom-small">
                                    {{ __('vrijwilliger.text_13') }}
                                </p>
                                

                         </div>
                        </div>

                        <div class="contact-form">

                            <span class="dropshadow-5-filter">
                            <div class="contact-form__left">
                                <p class="contact-form__left--text paragraph-big__dark u-margin-bottom-medium">
                                    {{ __('vrijwilliger.contact_text') }}</p>
                                <hr class="contact-form__left--line u-margin-bottom-medium">
                            </div>
                        </span>
                        <div class="contact-form__right contact-form__right--dark">
                            <form method="POST" action="/contact/mail"  class="contact-form__form">
                                @csrf
                                <h4 class="heading-4 u-margin-bottom-small">{{ __('main.contact_intro') }}</h4>
                                <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_name') }}</p>
                                <input class="input-field-base u-margin-bottom-small" required type="text" name='name' placeholder="{{ __('main.contact_name_placeholder') }}">
                                <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_mail') }}</p>
                                <input class="input-field-base u-margin-bottom-small" required type="email" name='email' placeholder="{{ __('main.contact_mail_placeholder') }}">
                                <p class="paragraph-medium__light u-margin-bottom-small">{{ __('main.contact_msg') }}</p>
                                <input type="hidden" name="page" value="Contact">
                                <textarea class="input-field-base input-field__long-text u-margin-bottom-medium" required name='message'  placeholder="{{ __('main.contact_msg_placeholder') }}"></textarea>
                                <button type="submit" class="btn-pink">{{ __('main.click_here') }}</button>
                            </form>
                        </div>
                        
                        </div>

                         <div class="illustration-section__sticky-bottom-illustration"">
                            <img src="img/bg-illustrations/bg-illustration-8.svg" alt="Image of the sun and clouds">
                        </div>


    </section>

        

    @stop