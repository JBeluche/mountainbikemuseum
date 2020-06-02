@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent        
        <header class="two-halfs__header" >
            
            <div title="An image of a sign telling 'come in, it's nice here'" 
            class="two-halfs__header-image"
            style="background-image: url(img/vriend.jpg);"></div>

            <h1 class="heading-1 two-halfs__header-title">{{ __('vriend.header_title') }}</h1>

            <div class="two-halfs__header-content">

                <p class="paragraph-regular__light two-halfs__header-text">
                    {{ __('vriend.header_text') }}
                </p>
            </div>

        
        </header>
        @include('components.retro-bar-thick')

        <section class="vriend__section">

            <h2 class="u-margin-bottom-medium heading-5 vriend__section--title">{{ __('vriend.section_title') }}</h2>
                      
            <div class=" u-margin-bottom-medium centered-text centered-text">
                <p class="paragraph-regular__light">{{ __('vriend.section_intro_1') }}<a class="vriend__section--link" href="/doneren">{{ __('vriend.section_intro_2') }}</a> </p>
            </div>


                <div class="long-card__wrapper long-card__wrapper-2-cards">        
                <div class="long-card long-card--small dropshadow-4">

                    <div class="long-card__gradient-decoration long-card__gradient-decoration--top long-card__gradient-decoration--purple dropshadow-4"></div>
        
                    <h1 class="long-card__title">{{ __('vriend.abo_title_1') }}</h1>
        
                    <div class="long-card__fold long-card__fold--purple dropshadow-4 dropshadow-4">
                            <p class="long-card__price paragraph-big__light">25-, &euro;</p>
                        </div>
        
                        <ul class="long-card__list">    
                                    
                                <li>{{ __('vriend.abo_point_1') }}</li>
                                    <li><hr class="long-card__hr long-card__hr--purple"></li>                                    
                                <li>{{ __('vriend.abo_point_2') }}</li>
                                    <li><hr class="long-card__hr long-card__hr--purple"></li>
                                <li>{{ __('vriend.abo_point_3') }}</li>
                                    
        
                        </ul>
                        <form class="long-card__form" action="/checkout/auth" method="POST">
                            @csrf 
                            <input type="hidden" name="product_id" value="5">
                            <input type="hidden" name="page_title" value="Vriend woorden">
                            
                            <button class="long-card__button btn-gradient  	btn-gradient__purple paragraph-semibold-16__light dropshadow-4">{{ __('vriend.click') }}</button>
                        </form>
        
                    <div class="long-card__gradient-decoration long-card__gradient-decoration--bottom long-card__gradient-decoration--purple dropshadow-4"></div> 
                
        
                </div>
        <div class="long-card long-card--small dropshadow-4">

            <div class="long-card__gradient-decoration long-card__gradient-decoration--top long-card__gradient-decoration--pink dropshadow-4"></div>

            <h1 class="long-card__title">{{ __('vriend.abo_title_2') }}</h1>

            <div class="long-card__fold long-card__fold--pink dropshadow-4">
                    <p class="long-card__price paragraph-big__light">50-, &euro;</p>
                </div>

                <ul class="long-card__list">    
                            
                        <li>{{ __('vriend.abo_point_1') }}</li>
                            <li><hr class="long-card__hr long-card__hr--pink"></li>                                    
                        <li>{{ __('vriend.abo_point_2') }}</li>
                        <li><hr class="long-card__hr long-card__hr--pink"></li>
                        <li>{{ __('vriend.abo_point_3') }}</li>
                        <li><hr class="long-card__hr long-card__hr--pink"></li>
                        <li>{{ __('vriend.abo_point_4') }}</li>
                            

                </ul>
                <form class="long-card__form" action="/checkout/auth" method="POST">
                    @csrf 
                    <input type="hidden" name="product_id" value="6">
                    <input type="hidden" name="page_title" value="Vriend woorden">
                    
                    <button class="long-card__button btn-gradient  	btn-pink paragraph-semibold-16__light dropshadow-4">{{ __('vriend.click') }}</button>
                </form>

            <div class="long-card__gradient-decoration long-card__gradient-decoration--bottom long-card__gradient-decoration--pink dropshadow-4"></div> 
        
        </div>


        </div>
    
            <img class="vriend__bottom-illustration" src="img/bg-illustrations/bg-illustration-5.svg" alt="Image of an autumn landscape with a woman biking">
        </section>

    @stop