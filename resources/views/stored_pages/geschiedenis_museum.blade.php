@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent       
    @include('scripts.dynamic_background')  
    <section class="big-grey-card__section dropshadow-4">

        <div class="big-grey-card__background-wrapper">
            <img src="/img/onderdelen_rek-min.jpg" id="background-image-main" alt="" class="big-grey-card__background-image">
            
            <img src="/img/retro-bar-1.svg" id="retrobar-1" alt="" class="big-grey-card__background-retro-bar">
            <img src="/img/fiets-1-min.jpg" id="background-image-1" alt="" class="big-grey-card__background-image">

            <img src="/img/retro-bar-1.svg" id="retrobar-2" alt="" class="big-grey-card__background-retro-bar">
            <img src="/img/MTBmuseum09-coen-de-jongh-min.jpg" id="background-image-2" alt="" class="big-grey-card__background-image">

            <img src="/img/retro-bar-1.svg" id="retrobar-3" alt="" class="big-grey-card__background-retro-bar">
            <img src="/img/MTBmuseum08-coen-de-jongh-min.jpg" id="background-image-3" alt="" class="big-grey-card__background-image">

            <img src="/img/retro-bar-1.svg" id="retrobar-4" alt="" class="big-grey-card__background-retro-bar">
            <img src="/img/Maarten-t-Hoen-foto-min.jpg" id="background-image-4" alt="" class="big-grey-card__background-image">
        </div>
 

        <div class="big-grey-card__card-container"> 
            <div class="big-grey-card__grey-area-fix" id="main_textfield"  >
                <h1 class="heading-1 u-margin-bottom-medium big-grey-card__textfield-header">{{ __('geschiedenis_museum.card_header') }}</h1>

                <p class="paragraph-regular__light big-grey-card__textfield-text" >
                    {{ __('geschiedenis_museum.card_text_1') }}
                    <br>
                    {{ __('geschiedenis_museum.card_text_2') }}
                    <br><br>
                    {{ __('geschiedenis_museum.card_text_3') }}
                    <br>
                    {{ __('geschiedenis_museum.card_text_4') }}
                    <br>
                    {{ __('geschiedenis_museum.card_text_5') }}
                    <br><br>
                    <b><i>{{ __('geschiedenis_museum.card_text_6') }}</i></b> 
                    <br>
                    {{ __('geschiedenis_museum.card_text_7') }}
                    <br><br>
                    <b><i>{{ __('geschiedenis_museum.card_text_8') }}</i></b> 
                    <br>
                    {{ __('geschiedenis_museum.card_text_9') }}
                    <br>
                    {{ __('geschiedenis_museum.card_text_10') }}
                    <br><br>
                    <b><i>{{ __('geschiedenis_museum.card_text_11') }}</i></b> 
                    <br>
                    {{ __('geschiedenis_museum.card_text_12') }}
                </p>
                <div class="big-grey-card__card-image--container">
                    <img class="big-grey-card__card-image" src="/img/jeroen_small_01.jpg" alt="An image about the content of the text (the image is dynamically generated)">
                </div>
            <p class="big-grey-card__quote">
                {{ __('geschiedenis_museum.quote_1') }}
                <br><br>
                {{ __('geschiedenis_museum.quote_2') }}
            </p>
            </div>
        </div>
</section>

<section class="timeline paragraph-regular__light--small">

    <div class="timeline__intro timeline__intro--museum">
        <h1 class="heading-1 u-margin-bottom-medium">{{ __('geschiedenis_mountainbike.timeline_title') }} </h1>


    </div>

    
    <img src="/img/svg/colorfull_timeline-2.svg" alt="A colorfull line to show the timeline" class="timeline__line timeline__line--museum">

    <img src="/img/svg/colorfull_timeline-2.svg" alt="A colorfull line to show the timeline" class="timeline__line--long timeline__line--long--museum">

    <div class="timeline__item-2 timeline__item--museum-2 timeline__item">
        <h3 class="timeline__item-header">1989 <br> <span>{{ __('geschiedenis_museum.timeline_title_1') }}</span></h3>
        <p>{{ __('geschiedenis_museum.timeline_text_1') }}</p>
            <img class="timeline__history-image timeline__history-image--jeroen" src="/img/museum/4.jpg" alt="Picture of Jeroen riding a bike down the stairs">
    </div>
       {{--<div class="timeline__item-2 timeline__item--museum-2 timeline__item">
        <h3 class="timeline__item-header">1990 – 2020 <br> <span>{{ __('geschiedenis_museum.timeline_title_2') }}</span></h3>
        <p>{{ __('geschiedenis_museum.timeline_text_2') }}</p>
    <img class="timeline__history-image" src="/img/museum/5.jpg" alt="Picture of the mountainbike museum building when it was bought">
    </div>--}} 
    <div class="timeline__item-3 timeline__item--museum-3 timeline__item">
        <h3 class="timeline__item-header">2014 <br> <span>{{ __('geschiedenis_museum.timeline_title_3') }}</span></h3>
        <p>{{ __('geschiedenis_museum.timeline_text_3') }} 
             </p>
             <img class="timeline__history-image" src="/img/museum/8.jpg" alt="Inside picture of the museum, with some bikes">
    </div>
    <div class="timeline__item-4 timeline__item--museum-4 timeline__item">
        <h3 class="timeline__item-header">2015 <br> <span>{{ __('geschiedenis_museum.timeline_title_4') }}</span></h3>
        <p>
            {{ __('geschiedenis_museum.timeline_text_4') }} 
             </p>
        <div class="timeline__two-images--wrapper timeline__two-images--wrapper-left">
             <img class="timeline__history-image" src="/img/museum/9.jpg" alt="Bart Brentjens opening the museum">
             <img class="timeline__history-image" src="/img/museum/10.jpg" alt="Bart Brentjens opening the museum">
        </div>
    </div>
    <div class="timeline__item-5 timeline__item--museum-5 timeline__item">
        <h3 class="timeline__item-header">2019<span>{{ __('geschiedenis_museum.timeline_text_5') }}</span></h3>
        <p></p>
        <img class="timeline__history-image" src="/img/museum/6.jpg" alt="Outside view of the museum in 2019">
    </div>
    <div class="timeline__item-6 timeline__item--museum-6 timeline__item">
        <h3 class="timeline__item-header">2020<span>{{ __('geschiedenis_museum.timeline_title_5') }}</span></h3>
        <p>{{ __('geschiedenis_museum.timeline_text_6') }}</p>
        <img class="timeline__history-image" src="/img/museum/7.jpg" alt="Inside view of the museum in 2020">
    </div>
</section>



    @stop
