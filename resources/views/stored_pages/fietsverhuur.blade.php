@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent        

    <header class="two-halfs__header">
            
        <div title="An image of a sign telling 'come in, it's nice here'" 
            style="background-image: url(img/rental_bike.jpg);" 
            class="two-halfs__header-image"></div>

        <h1 class="heading-1 two-halfs__header-title">{{ __('fietsenverhuur.page_title') }}</h1>

        <div class="two-halfs__header-content">

            <p class="paragraph-regular__light--small two-halfs__header-text">
                {{ __('fietsenverhuur.header_text_1') }}<br><br>

                {{ __('fietsenverhuur.header_text_2') }}<br>
                {{ __('fietsenverhuur.header_text_3') }}<br><br>

                {{ __('fietsenverhuur.header_text_4') }}<br>
                {{ __('fietsenverhuur.header_text_5') }}<br><br>
                {{ __('fietsenverhuur.header_text_6') }}

            </p>
        </div>

    
    </header>

    <section class="fiets-reserveren__section">
        <h1 class="header-main__h1">{{ __('fietsenverhuur.reserveren_title') }}</h1>
        <hr class="fiets-reserveren__heading-line">
        <div class="fiets-reserveren__card-intro">
            <img src="img/svg/retro-bar-4.svg" alt="A colorfull bar on the right side of the text" class="fiets-reserveren__retro-bar-card">
            <p class="fiets-reserveren__intro-text paragraph-semibold-16__light u-margin-bottom-medium">
                {{ __('fietsenverhuur.reserveren_text_1') }}</p> 
            <p class="fiets-reserveren__intro-text paragraph-semibold-16__light u-margin-bottom-medium">
                {{ __('fietsenverhuur.reserveren_text_2') }}<br>
                {{ __('fietsenverhuur.reserveren_text_3') }}<br>
                {{ __('fietsenverhuur.reserveren_text_4') }}
            </p> 
            <p class="fiets-reserveren__intro-text--price paragraph-semibold-16__light u-margin-bottom-medium"> 
                {{ __('fietsenverhuur.reserveren_text_5') }}<br>
                {{ __('fietsenverhuur.reserveren_text_6') }}
            </p> 
            <p class="fiets-reserveren__intro-text paragraph-semibold-16__light">
                {{ __('fietsenverhuur.reserveren_text_4') }}<br>
                {{ __('fietsenverhuur.reserveren_text_8') }}<br>
                {{ __('fietsenverhuur.reserveren_text_9') }} <a class="fiets-reserveren__mailto" href="mailto: info@mountainbikemuseum.nl">{{ __('fietsenverhuur.reserveren_text_10') }}</a>
            </p>
        </div>
            <h4 class="heading-4 fiets-reserveren__form-title" id="form">{{ __('fietsenverhuur.reserveren_text_11') }}</h4>

            <form method="POST" action="/{{$page->view}}#form" class="main-form fiets-reserveren__form">
                @csrf
                    
                    <div class=" main-form__dropdown main-form__dropdown--bigger main-form__centered fietsenverhuur-to-center">
                        <label for="password" class="main-form__label">{{ __('fietsenverhuur.reserveren_text_12') }}</label> 
                                <select name="people_count">
                                    @for ($i = 1; $i < 11; $i++)                                            
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                
                <div class="main-form__item-row-col--1-right main-form__down-centered">
                    <button type="submit" class="main-form__button">{{ __('fietsenverhuur.reserveren_text_13') }}</button>
                </div>

            </form>

            <hr class="fiets-reserveren__heading-line u-margin-top-bottom-medium">

            @if(Session::has('people_count'))
            
                <form method="POST" action="/reserveren-2" class="main-form fiets-reserveren__form">
                    @csrf                        

                        @for ($i = 0; $i < Session::get('people_count'); $i++)

                            @if($i === Session::get('people_count')-1 and $i % 2 == 0)
                                <div class=" main-form__dropdown main-form__dropdown--bigger main-form__centered" style="grid-column: 1 / 3;">
                            @else
                                <div class=" main-form__dropdown main-form__dropdown--bigger">
                            @endif
                                <label class="main-form__label" for="persons">{{ __('fietsenverhuur.reserveren_text_14') }} {{$i + 1}}</label>
                                    <select name="persons[]">
                                        @for ($x = 1.00; $x < 2.30; $x+=0.05)                                            
                                            <option value="{{number_format($x, 2)}}">{{number_format($x, 2)}} {{ __('fietsenverhuur.reserveren_text_15') }}</option>
                                        @endfor
                                    </select>
                            </div>
                    @endfor


                    {{Session::forget('people_count')}}

                    <div class=" main-form__down-centered"
                        style="grid-column: 1 / 3;">
                        <button type="submit" class="main-form__button">{{ __('fietsenverhuur.reserveren_text_16') }}</button>
                    </div>

                </form>
                @endif

    </section>
    
    @stop