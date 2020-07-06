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
                {{ __('home.not_found') }}<br>{{ __('home.data_textdsadas') }}
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
            @stop