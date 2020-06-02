


@foreach($components as $component) 
    @if($component->name === 'carousel_text')

    <section class="carousel-text">

        <img class="carousel-text__dots carousel-text__dots--left" src="img/dot-effect-1.png" alt="An set of white dots">

        <div class="carousel-text__window">
                        <ul class="carousel-text__window--list"> 
                        @foreach($component->textfields as $key => $textfield)                  
    
                            @if ($key === 0)                          
                                <li id="no-js-slider-{{$key}}" class="carousel-text__window--slide">
                                    
                                        {!! $textfield->content !!}

                                    <a class="prev" href="#no-js-slider-{{count($component->textfields) - 1}}">

                                            <div class="carousel-text__button carousel-text__button--left">                
                                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                    <p>{{$component->textfields[count($component->textfields) - 1]->name}}</p>            
                                                </div>
                                            </a>
                                        
                                    <a class="next" href="#no-js-slider-{{$key + 1}}">
                                            <div class="carousel-text__button carousel-text__button--right">
                                                    <p>{{$component->textfields[$key + 1]->name}}</p>
                                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                </div>
                                    </a>
                                </li>

                                @elseif ($key === count($component->textfields) - 1)  
                                <li id="no-js-slider-{{$key}}" class="carousel-text__window--slide">
                             
                                        {!! $textfield->content !!}

                                    <a class="prev" href="#no-js-slider-{{$key - 1 }}">
                                            <div class="carousel-text__button carousel-text__button--left">
                                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                    <p>{{$component->textfields[$key - 1]->name}}</p>
                                            </div>
                                    
                                    </a>
                                    <a class="next" href="#no-js-slider-0"> 
                                            <div class="carousel-text__button carousel-text__button--right">
                                                    <p>{{$component->textfields[0]->name}}</p>
                                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                </div>
                                </a>
                                </li>
                                
                            @else
                                <li id="no-js-slider-{{$key}}" class="slide">
                             
                                        {!! $textfield->content !!}

                                    <a class="prev" href="#no-js-slider-{{$key- 1 }}">
                                            <div class="carousel-text__button carousel-text__button--left">
                                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                    <p>{{$component->textfields[$key - 1]->name}}</p>
                                                </div>
                                    
                                    </a>
                                    <a class="next" href="#no-js-slider-{{$key + 1}}">
                                            <div class="carousel-text__button carousel-text__button--right">
                                                    <p>{{$component->textfields[$key + 1]->name}}</p>
                                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                </div>
                                    </a>
                                </li>
                        
                            @endif                    
                        @endforeach     

                        </ul>

            



       


    

        </div>

        <img class="carousel-text__dots carousel-text__dots--right" src="img/dot-effect-1.png" alt="An set of white dots">
        
   
    </section>


        
    @endif
@endforeach