@extends('layouts.main')

@section('page-title', $page->name)




@section('content')
    @parent
    
    
    <section class="carousel">

        <div class="carousel__content-wrapper">
            <h1 class="carousel__title heading-1 u-margin-bottom-medium">{{ __('collectie.title') }}</h1>
            <p class="carousel__text paragraph-regular__light u-margin-bottom-medium">
                {{ __('collectie.text_1') }}<br> <br>
                
                {{ __('collectie.text_2') }}<br><br>
                {{ __('collectie.text_3') }}
                </p>
     
        </div>

        <div class="carousel__window carousel__window--collection">
            <ul>
                       
                    <li id="no-js-slider-0" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-1-min.jpg">
                        <a class="prev" href="#no-js-slider-9">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-1">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-1" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-2-min.jpg">
                        <a class="prev" href="#no-js-slider-0">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-2">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>
                    
                    <li id="no-js-slider-2" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-3-min.jpg">
                        <a class="prev" href="#no-js-slider-1">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-3">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-3" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-4-min.jpg">
                        <a class="prev" href="#no-js-slider-2">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-4">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-4" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-5-min.jpg">
                        <a class="prev" href="#no-js-slider-3">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-5">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-5" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-6-min.jpg">
                        <a class="prev" href="#no-js-slider-4">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-6">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-6" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-7-min.jpg">
                        <a class="prev" href="#no-js-slider-5">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-7">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-7" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-8-min.jpg">
                        <a class="prev" href="#no-js-slider-6">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-8">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-8" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-9-min.jpg">
                        <a class="prev" href="#no-js-slider-7">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-9">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                    <li id="no-js-slider-9" class="slide">
                        <img  class="slide-image" src="/img/collectie/fiets-display-10-min.jpg">
                        <a class="prev" href="#no-js-slider-8">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-0">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

           
            </ul>
    
    </div>
            
            <img src="img/dot-effect-2.png" alt="White dots on the left of the page for decoration purposes" class="carousel__dot-effect--left">
            <img src="img/dot-effect-2.png" alt="White dots on the right of the page for decoration purposes" class="carousel__dot-effect--right">


            <img class="carousel__bottom-illustration" src="img/bg-illustrations/bg-illustration-7.svg" alt="Image of a mountain top with someone biking">

        </section>





    
    
    @stop