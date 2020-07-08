@extends('layouts.main')

@section('page-title', $page->name)





@section('content')
@parent



                <section class="centered-text-and-images">
                    <img class="u-margin-bottom-big " style="width: 100%;" src="/img/re-opening banner.jpg">
                    
                    <h1 class="heading-1  u-margin-bottom-big"> {{ __('home.not_found') }} </h1>
                    
                    <p class="paragraph-big__dark "> {{ __('home.not_found') }} </p>
                    
                    <p class="paragraph-big__dark >
                        
                        {{ __('home.not_found') }}
                        
                        <a class="link paragraph-big__dark" target="blank" href="home"> {{ __('home.Tamara_text') }} </a>
                        
                        {{ __('home.not_found') }}
                        
                        <a class="link paragraph-big__dark" target="blank" href="home"> {{ __('home.not_found') }} </a>{{ __('home.not_found') }}</p></p><p class="paragraph-big__dark "> {{ __('home.not_found') }} </p><br><p class="paragraph-big__dark "> {{ __('home.not_found') }} </p><br><p class="paragraph-big__dark "> {{ __('home.not_found') }} </p></section>
            @stop