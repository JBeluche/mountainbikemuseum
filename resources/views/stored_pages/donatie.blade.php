@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent
    <header class="header-lint" style="background-image: url(img/donatie.jpg)">

        <div class="header-lint__lint">
            <h1 class="heading-1  u-margin-bottom-medium-big">{{ __('donatie.header_title') }}</h1>
            <p class="paragraph-big__light header-lint__text">{{ __('donatie.header_titletext_1') }}<br>
                {{ __('donatie.header_titletext_2') }}<br>
                {{ __('donatie.header_titletext_3') }}
                <i> <b>  <a href="/sponsoring">
                    {{ __('donatie.header_titletext_4') }}</a></b></i>
                    </p>
        </div>

        </header>

    @include('components.retro-bar-thick')

    <section    class="illustration-section donation__section"  
                title="A beautiful purple background of nature with a campfire and bike"
                style=" background-image: url(img/bg-illustrations/bg-illustration-4.svg);                             
                        background-color: #571575;
                        padding-bottom: 30rem;">

                        <h1 class="heading-fat donation__fat-header">{{ __('donatie.donation_text_1') }}</h1>

                        <div class="donation__card dropshadow-5 ">

                            <img src="img/svg/retro-bar-4.svg" alt="A colorfull border" class="donation__card--retro-border">   

                            <div class="donation__card--wrapper">

                                <h2 class="donation__card--heading-2 u-margin-bottom-medium-big">{{ __('donatie.donation_text_2') }}</h2>

                                <h4 class="donation__card--heading-4 u-margin-bottom-medium-big">{{ __('donatie.donation_text_3') }}</h4>

                                <div class="donation__card--button-container u-margin-bottom-medium-big">    
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="5">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">5 &euro;</button>
                                    </form>                                
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="10">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">10 &euro;</button>
                                    </form>
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="15">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">15 &euro;</button>
                                    </form>
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="20">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">20 &euro;</button>
                                    </form>
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="25">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">25 &euro;</button>
                                    </form>
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="50">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">50 &euro;</button>
                                    </form>
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="75">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">75 &euro;</button>
                                    </form>
                                    <form method="POST" action="/checkout/auth">
                                        @csrf
                                        <input type="hidden" name="price" value="100">
                                        <input type="hidden" name="product_id" value="7">
                                        <input type="hidden" name="page_title" value="{{ $page->name }}">
                                        <button type="submit" class="donation__card--button">100 &euro;</button>
                                    </form>

                                </div>

                                
                                <hr class="donation__card--hr u-margin-bottom-medium-big">
                                <form method="POST" action="/checkout/auth">
                                    @csrf
                                    <input type="hidden" name="product_id" value="7">
                                    <input type="hidden" name="page_title" value="{{ $page->name }}">
                                    <span class="input-symbol-euro">
                                        <input type="number" name="price" min="1" required step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" title="Numbers only" placeholder="{{ __('donatie.donation_text_4') }}" class="u-margin-bottom-medium donation__card--custom-input"><br>
                                    </span>
                                        <button type="submit" class="btn-pink">{{ __('donatie.donation_text_5') }}</button>
                                </form>
                            </div>
                         </div>

    </section>

        

    @stop