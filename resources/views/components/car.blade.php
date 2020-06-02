@foreach($components as $component) 
    @if($component->name === 'carousel_pictures_1')

        <section class="carousel">

        <div class="carousel__content-wrapper">
            <h1 class="carousel__title heading-1 u-margin-bottom-medium">Collectie</h1>
            <p class="carousel__text paragraph-regular__light u-margin-bottom-medium">
                Onze collectie beslaat meer dan 850 fietsen, bestaande uit 160 merken. 
                De complete collectie is bij elkaar gespaard door oprichter en eigenaar Jeroen van Roekel. <br> <br>
                
                Je ziet in het Mountainbike Museum & Trailcenter het hele spectrum van de afgelopen 30 jaar, van de eerste mountainbikes die ooit gemaakt zijn, tot ultramoderne, volgeveerde, carbon en aluminium exemplaren. Ook BMX fietsen – Jeroens oude liefde – en limited edition mountainbikes vind je bij ons terug. In het museum is een tijdlijn opgesteld: deze laat de ontwikkeling van de mountainbike zien. Natuurlijk hebben we ook een behoorlijke collectie aan mountainbike memorabilia. Denk aan: 
                t-shirts, voorvorken, gereedschap en high end onderdelen in de meest excentrieke kleuren. <br>
                Kom kijken en oordeel zelf!
                </p>
     
        </div>

        <div class="carousel__window">
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


        </section>

    @endif

@endforeach

