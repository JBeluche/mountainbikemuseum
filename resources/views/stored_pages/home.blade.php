@extends('layouts.main')

@section('page-title', $page->name)





@section('content')
@parent



            <header class="header-main" style="background-image:url(/img/home.jpg);">

                <div class="overflow-padding">
                    <div class="header-main__dots header-main__dots--left">
                            <img src="img/dot-effect-1.png" alt="A set of dot to create an nice effect over the header image"
                                    class="">
                    </div>
                </div>
        
                <h1 class="header-main__h1">
                {{ __('home.home_1') }}<br>{{ __('home.home_2') }}
                </h1>
        
                <div class="overflow-padding">
                    <div class="header-main__dots header-main__dots--right">
                            <img src="/img/dot-effect-1.png" alt="A set of dot to create an nice effect over the header image">
                    </div>
                </div>
            
            </header>
            
            <div class="retro-bar-full">
                <img src="img/retro-bar-1.svg" alt="A thick colorfull line stretching over the full width of the website">
            </div>
            
                <section class="centered-text-and-images"><img class="u-margin-bottom-big " style="width: 100%;" src="/img/re-opening banner.jpg"><h1 class="heading-1  u-margin-bottom-big"> {{ __('home.open_title') }} </h1><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.open_text-1') }} </p><p class=" u-padding-sides-big paragraph-big__dark">{{ __('home.open_text-2') }}<a class="link paragraph-big__dark" target="blank" href="https://www.mountainbikemuseum.nl/pdf/Nieuwecoronamaatregelentekst.pdf"> {{ __('home.open_text-3') }} </a>{{ __('home.open_text-4') }}<a class="link paragraph-big__dark" target="blank" href="https://www.eventbrite.nl/o/mountainbike-museum-30523003796"> {{ __('home.open_text-5') }} </a>{{ __('home.open_text-6') }}</p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.open_text-7') }} </p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.open_text-8') }} </p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.open_text-9') }} </p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><h2 class="heading-2-normal"> {{ __('home.open_text-10') }} </h2><img class="image-banner" src="/img/support.jpg"><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_1') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_2') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_3') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_4') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_5') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_6') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_7') }} </p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_8') }} </p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_9') }} </p><p class="u-margin-bottom-medium-small u-padding-sides-big"></p><p class="u-padding-sides-big paragraph-big__dark "> {{ __('home.uitleg_10') }} </p></section>
            @stop