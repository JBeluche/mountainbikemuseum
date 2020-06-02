@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent        
    @include('scripts.dynamic_background') 
    
    <section class="big-grey-card__section dropshadow-4">

    
        <div class="big-grey-card__background-wrapper">
            <img src="img/onderdelen_rek-min.jpg" id="background-image-main" alt="" class="big-grey-card__background-image">
            
            <img src="img/retro-bar-1.svg" id="retrobar-1" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/fiets-1-min.jpg" id="background-image-1" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" id="retrobar-2" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/MTBmuseum09-coen-de-jongh-min.jpg" id="background-image-2" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" id="retrobar-3" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/MTBmuseum08-coen-de-jongh-min.jpg" id="background-image-3" alt="" class="big-grey-card__background-image">

            <img src="img/retro-bar-1.svg" id="retrobar-4" alt="" class="big-grey-card__background-retro-bar">
            <img src="img/Maarten-t-Hoen-foto-min.jpg" id="background-image-4" alt="" class="big-grey-card__background-image">
        </div>
 

        <div class="big-grey-card__card-container"> 
            <div class="big-grey-card__grey-area-fix" id="main_textfield">
                <h1 class="heading-1 u-margin-bottom-medium big-grey-card__textfield-header">{{ __('geschiedenis_mountainbike.header_card') }}</h1>

                    <div class="paragraph-regular__light big-grey-card__textfield-text">      
                <p class="u-margin-bottom-medium paragraph-regular__light big-grey-card__textfield-text">                    
                    {{ __('geschiedenis_mountainbike.text_1') }} <br>
                    {{ __('geschiedenis_mountainbike.text_2') }}<br>
                    {{ __('geschiedenis_mountainbike.text_3') }} 
                </p>

                <h3 class="u-margin-bottom-small heading-3">{{ __('geschiedenis_mountainbike.heading_1') }} </h3>                    
                <p class="u-margin-bottom-medium">
                    {{ __('geschiedenis_mountainbike.text_4') }} 
                </p>

                <p class="u-margin-bottom-medium big-grey-card__quote--small">
                    {{ __('geschiedenis_mountainbike.quote_1') }} 
                     <br>
                     {{ __('geschiedenis_mountainbike.quote_2') }} 
                    </p>

                    <h3 class="u-margin-bottom-small heading-3">{{ __('geschiedenis_mountainbike.heading_2') }} </h3>
                    <p class="u-margin-bottom-medium">{{ __('geschiedenis_mountainbike.text_5') }} <br>
                        {{ __('geschiedenis_mountainbike.text_6') }} 
                         <br>
                         {{ __('geschiedenis_mountainbike.text_7') }} 
                        </p>

                    <h3 class="u-margin-bottom-small heading-3">{{ __('geschiedenis_mountainbike.heading_3') }} </h3>

                    <p class="u-margin-bottom-medium">{{ __('geschiedenis_mountainbike.text_8') }} <br><br>    
                        {{ __('geschiedenis_mountainbike.text_9') }} 
                         <br><br>                  
                         {{ __('geschiedenis_mountainbike.text_10') }} 
                        <br>
                        {{ __('geschiedenis_mountainbike.text_11') }} 
                         <br>
                        </p>
                    </div>



            </div>

        </div>
</section>

    @include('components.timeline')
    
    @include('components.retro-bar-thick')

    <section class="tree-illustration__section">

        <div class="tree-illustration__text-wrapper">
            <h3 class="heading-3 u-margin-bottom-small">{{ __('geschiedenis_mountainbike.fact_title') }} </h3>

            <p class="u-margin-bottom-medium">
                {{ __('geschiedenis_mountainbike.fact_fact_1a') }} <br><br>
                {{ __('geschiedenis_mountainbike.fact_fact_1b') }} <br><br>
                {{ __('geschiedenis_mountainbike.fact_fact_2') }} <br><br>
                {{ __('geschiedenis_mountainbike.fact_fact_3') }} <br><br>
                {{ __('geschiedenis_mountainbike.fact_fact_4') }} <br><br>
                {{ __('geschiedenis_mountainbike.fact_fact_5') }} <br>
                </p>

                <h3 class="heading-3 u-margin-bottom-small">{{ __('geschiedenis_mountainbike.source_title') }}</h3>

                <p class="u-margin-bottom-medium">{{ __('geschiedenis_mountainbike.source_intro_1') }} <br>
                    {{ __('geschiedenis_mountainbike.source_intro_2') }}
                </p>
                    <ul class="u-margin-bottom-medium">
                        <li class="u-margin-bottom-small"><a href="https://mmbhof.org/mtn-bike-hall-of-fame/history/" target="blank">{{ __('geschiedenis_mountainbike.source_1') }}</a></li> 
                        <li class="u-margin-bottom-small"><a href="http://sonic.net/~ckelly/Seekay/index.htm" target="blank">{{ __('geschiedenis_mountainbike.source_2') }}</a></li> 
                        <li class="u-margin-bottom-small"><a href="https://www.wired.com/2016/06/history-mountain-bike-unsurprisingly-badass/" target="blank">{{ __('geschiedenis_mountainbike.source_3') }}</a></li> 
                        <li class="u-margin-bottom-small"><a href="https://www.velozine.nl/nieuws/35-jaar-geleden/" target="blank">{{ __('geschiedenis_mountainbike.source_4') }}</a></li>                 
                    </ul>
                    

                    <h3 class="heading-3 u-margin-bottom-small">{{ __('geschiedenis_mountainbike.alive_title') }}</h3>

                    <p>{{ __('geschiedenis_mountainbike.alive_text_1') }}<br>  <i>  <a href="/donatie" style="font-size: 1.8rem; font-weight: bold;">{{ __('geschiedenis_mountainbike.alive_text_2') }}</a></i>{{ __('geschiedenis_mountainbike.alive_text_3') }}</p>
                </div>
                    <img class="tree-illustration__illustration-image" src="img/bg-illustrations/bg-illustration-6.svg" alt="Image of a tree and man with a bike on his sholder">

    </section>

    @stop