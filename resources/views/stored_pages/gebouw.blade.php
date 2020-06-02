@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent

    <section class="big-grey-card__section dropshadow-4">

    

        <div class="big-grey-card__background-wrapper">
            <img src="img/locatie/4-min.jpg" id="background-image-main" alt="" class="big-grey-card__background-image">
            
            <img src="img/retro-bar-1.svg" id="retrobar-1" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/locatie/2-min.jpg" id="background-image-1" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" id="retrobar-2" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/locatie/1-min.jpg" id="background-image-2" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" id="retrobar-3" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/locatie/3-min.jpg" id="background-image-3" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" id="retrobar-4" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/locatie/2-min.jpg" id="background-image-4" alt="" class="big-grey-card__background-image">
        </div>
 

        <div class="big-grey-card__card-container"> 
            <div class="big-grey-card__grey-area-fix" id="main_textfield">
                <h1 class="heading-1 u-margin-bottom-medium big-grey-card__textfield-header">{{ __('gebouw.title') }}</h1>

                <p class="paragraph-regular__light u-margin-bottom-medium big-grey-card__textfield-text">
                    {{ __('gebouw.text_1') }}<br><br>

                    {{ __('gebouw.text_2') }}<br><br>

                    {{ __('gebouw.text_3') }}<br>
                    {{ __('gebouw.text_4') }}
                </p>
                    <ul class="paragraph-regular__light u-margin-bottom-medium">
                        <li><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('gebouw.text_5') }}</span></li>
                        <li><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('gebouw.text_6') }}</span></li>
                        <li><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('gebouw.text_7') }}</span></li>
                        <li><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('gebouw.text_8') }}</span></li>
                        <li><span class="big-grey-card__bullet-point">&bull;</span> <span class="big-grey-card__list-item">{{ __('gebouw.text_9') }}</span></li>
                    </ul>

                    <p class="paragraph-regular__light big-grey-card__textfield-text">
                        {{ __('gebouw.text_10') }}<br> <br>

                        {{ __('gebouw.text_11') }}<br> <br>

                        {{ __('gebouw.text_12') }}<br>
                        {{ __('gebouw.text_13') }}<br>
                        {{ __('gebouw.text_14') }} <i> <b> <a class="link" href="arrangementen">{{ __('gebouw.text_15') }}</a></b></i>.
                </p>                

            </div>

        </div>
</section>
@include('scripts.dynamic_background') 

    @stop