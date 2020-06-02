@foreach($components as $component) 
    @if($component->name === 'carousel_pictures_1')

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
            @foreach($component->imagefields as $key => $imageField)                  

                @if ($key === 0)                          
                    <li id="no-js-slider-{{$key}}" class="slide">
                        <img  class="slide-image" src="img/collectie/{{$imageField->name}}">
                        <a class="prev" href="#no-js-slider-{{ $component->imagefields->count()}}">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>                        
                        <a class="next" href="#no-js-slider-{{$key + 1}}">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>

                @elseif ($key === $component->imagefields->count() - 1)  
                    <li id="no-js-slider-{{$key}}" class="slide">
                        <img class="slide-image" src="img/collectie/{{$imageField->name}}">
                        <a class="prev" href="#no-js-slider-{{$key - 1 }}">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>
                        <a class="next" href="#no-js-slider-0"> 
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>
                    
                @else
                    <li id="no-js-slider-{{$key}}" class="slide">
                        <img class="slide-image" src="img/collectie/{{$imageField->name}}">
                        <a class="prev" href="#no-js-slider-{{$key- 1 }}">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the left"></a>
                        <a class="next" href="#no-js-slider-{{$key + 1}}">
                            <img src="img/svg/arrow_1.svg" alt="An icon of an arrow pointing to the right"></a>
                    </li>
            
                @endif                    
            @endforeach     
    </div>
            
            <img src="img/dot-effect-2.png" alt="White dots on the left of the page for decoration purposes" class="carousel__dot-effect--left">
            <img src="img/dot-effect-2.png" alt="White dots on the right of the page for decoration purposes" class="carousel__dot-effect--right">


            <img class="carousel__bottom-illustration" src="img/bg-illustrations/bg-illustration-7.svg" alt="Image of a mountain top with someone biking">

        </section>


    @endif

@endforeach

