<section class="carousel-text">

    <img class="carousel-text__dots carousel-text__dots--left" src="img/dot-effect-1.png" alt="An set of white dots">

    <div class="carousel-text__window">

        <div class="stack-wrapper">

            {{--Item 1--}}
            <div id="item-1" class="item">
                  {{--Here goes the content--}}
                  <h2 class="carousel-text__title heading-2 u-margin-bottom-medium-big">
                    {{ __('arrangementen.title_1') }}
                </h2>
                <p class="carousel-text__text paragraph-regular__light--small u-margin-bottom-medium-big">
                    {{ __('arrangementen.text_1_a') }}<br> <br>

                    {{ __('arrangementen.text_1_b') }}<br> <br>

                    {{ __('arrangementen.text_1_c') }}</p>
                </p>
                {{--This are the navigation buttons--}}
                <div class="carousel-text__button-wrapper">
                    <button class="prev prev-text" onClick="reply_click(this.id)" id="prev-1" ">
                        <div class="carousel-text__button carousel-text__button--left">
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                            <p>{{ __('arrangementen.title_5') }}</p>
                        </div>
                    </button>
                    <button class="next next-text" onClick=" reply_click(this.id)" id="next-1" ">
                        <div class="carousel-text__button carousel-text__button--right">
                            <p>{{ __('arrangementen.title_2') }}</p>
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                        </div>
                    </button>
                </div>
            </div>
            
                {{--Item 2--}}
            <div  id="item-2" class="item">
                          {{--Here goes the content--}}
                          <h2 class="u-margin-bottom-medium-big carousel-text__title heading-2">{{ __('arrangementen.title_2') }}
                        </h2>
                        <p class="u-margin-bottom-medium-big carousel-text__text paragraph-regular__light--small ">
                            {{ __('arrangementen.text_2_a') }}<br>
                            {{ __('arrangementen.text_2_b') }}<br> <br>
        
                            {{ __('arrangementen.text_2_c') }}<br> <br>
        
                            {{ __('arrangementen.text_2_d') }}<br> <br>
        
                            {{ __('arrangementen.text_2_e') }}</p>
                    {{--This are the navigation buttons--}}
                        <div class="carousel-text__button-wrapper">
                            <button class="prev prev-text" onClick="reply_click(this.id)" id="prev-2">
                                <div class="carousel-text__button carousel-text__button--left">
                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                    <p>{{ __('arrangementen.title_1') }}</p>
                                </div>
                            </button>
                            <button class="next next-text" onClick="reply_click(this.id)" id="next-2">
                                <div class="carousel-text__button carousel-text__button--right">
                                    <p>{{ __('arrangementen.title_3') }}</p>
                                    <img src="img/lightblue-button.png" alt="A blue triangular button">
                                </div>
                            </button>
                        </div>
            </div>

            {{--Item 3--}}
            <div id="item-3" class="item">
                {{--Here goes the content--}}
                <h2 class="u-margin-bottom-medium-big carousel-text__title heading-2">{{ __('arrangementen.title_3') }}
                </h2>
                <p class="carousel-text__text paragraph-regular__light--small u-margin-bottom-medium-big">
                    {{ __('arrangementen.text_3_a') }}<br> <br>

                    {{ __('arrangementen.text_3_b') }}<br> <br>

                    {{ __('arrangementen.text_3_c') }}<br><br>

                    {{ __('arrangementen.text_3_d') }}</p>
                {{--This are the navigation buttons--}}
                <div class="carousel-text__button-wrapper">
                    <button class="prev prev-text" onClick="reply_click(this.id)" id="prev-3">
                        <div class="carousel-text__button carousel-text__button--left">
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                            <p>{{ __('arrangementen.title_2') }}</p>
                        </div>
                    </button>
                    <button class="next next-text" onClick="reply_click(this.id)" id="next-3">
                        <div class="carousel-text__button carousel-text__button--right">
                            <p>{{ __('arrangementen.title_4') }}</p>
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                        </div>
                    </button>
                </div>
            </div>

            {{--Item 4--}}
            <div id="item-4" class="item">
                {{--Here goes the content--}}
                <h2 class="u-margin-bottom-medium-big carousel-text__title heading-2">{{ __('arrangementen.title_4') }}
                </h2>
                <p class="u-margin-bottom-medium-big carousel-text__text paragraph-regular__light--small ">
                    {{ __('arrangementen.text_4_a') }}<br> <br>

                    {{ __('arrangementen.text_4_b') }}<br> <br>

                    {{ __('arrangementen.text_4_c') }}
                </p>
                {{--This are the navigation buttons--}}
                <div class="carousel-text__button-wrapper">
                    <button class="prev prev-text" onClick="reply_click(this.id)" id="prev-4">
                        <div class="carousel-text__button carousel-text__button--left">
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                            <p>{{ __('arrangementen.title_3') }}</p>
                        </div>
                    </button>
                    <button class="next next-text" onClick="reply_click(this.id)" id="next-4">
                        <div class="carousel-text__button carousel-text__button--right">
                            <p>{{ __('arrangementen.title_5') }}</p>
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                        </div>
                    </button>
                </div>
            </div>

            {{--Item 5--}}
            <div id="item-5" class="item">
                {{--Here goes the content--}}
                <h2 class="u-margin-bottom-medium-big carousel-text__title heading-2">{{ __('arrangementen.title_5') }}
                </h2>
                <p class="u-margin-bottom-medium-big carousel-text__text paragraph-regular__light--small ">
                    {{ __('arrangementen.text_5_a') }}<br> <br>

                    {{ __('arrangementen.text_5_b') }}<br> <br>

                    {{ __('arrangementen.text_5_c') }}<br> <br>

                    {{ __('arrangementen.text_5_d') }}
                </p>
                {{--This are the navigation buttons--}}
                <div class="carousel-text__button-wrapper">
                    <button class="prev prev-text" onClick="reply_click(this.id)" id="prev-5">
                        <div class="carousel-text__button carousel-text__button--left">
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                            <p>{{ __('arrangementen.title_4') }}</p>
                        </div>
                    </button>
                    <button class="next next-text" onClick="reply_click(this.id)" id="next-5">
                        <div class="carousel-text__button carousel-text__button--right">
                            <p>{{ __('arrangementen.title_1') }}</p>
                            <img src="img/lightblue-button.png" alt="A blue triangular button">
                        </div>
                    </button>
                </div>
            </div>

            </div>

        </div>

        <img class="carousel-text__dots carousel-text__dots--right" src="img/dot-effect-1.png"
            alt="An set of white dots">

        <style>
          

        </style>

        <script>
            document.getElementById('item-1').style.display = 'flex';

    function reply_click(clicked_id)
    {
        itemNumber = Number(clicked_id.charAt(clicked_id.length-1)); //This gets the id number based on the clicked button id
        document.getElementById('item-' + itemNumber).style.display = 'none'; //Hide previous element

        //Check if you need to go back and forward
        if(clicked_id == 'next-' + itemNumber){
            var newItemNumber = itemNumber + 1;
            //Check if its the first item
            if(newItemNumber == 6){
                document.getElementById('item-1').style.display = 'flex';
            }
            else{
                document.getElementById('item-' + newItemNumber).style.display = 'flex';
            }
        }
        else if(clicked_id == 'prev-' + itemNumber){
            var newItemNumber = (itemNumber - 1);
            //Check if its the last item
            if(newItemNumber == 0){
                document.getElementById('item-5').style.display = 'flex';
            }
            else{
                document.getElementById('item-' + newItemNumber).style.display = 'flex';
            }
        }
    } 




        </script>

</section>



{{--
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
                                <a class="prev prev-text" href="#no-js-slider-{{count($component->textfields) - 1}}">
                                        <div class="carousel-text__button carousel-text__button--left">                
                                                <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                <p>{{$component->textfields[count($component->textfields) - 1]->name}}</p>            
                                            </div>
                                        </a>
                                    
                                <a class="next next-text" href="#no-js-slider-{{$key + 1}}">
                                        <div class="carousel-text__button carousel-text__button--right">
                                                <p>{{$component->textfields[$key + 1]->name}}</p>
                                                <img src="img/lightblue-button.png" alt="A blue triangular button">
                                            </div>
                                </a>
                            </li>
                            @elseif ($key === count($component->textfields) - 1)  
                            <li id="no-js-slider-{{$key}}" class="carousel-text__window--slide">
                         
                                    {!! $textfield->content !!}
                                <a class="prev prev-text" href="#no-js-slider-{{$key - 1 }}">
                                        <div class="carousel-text__button carousel-text__button--left">
                                                <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                <p>{{$component->textfields[$key - 1]->name}}</p>
                                        </div>
                                
                                </a>
                                <a class="next next-text" href="#no-js-slider-0"> 
                                        <div class="carousel-text__button carousel-text__button--right">
                                                <p>{{$component->textfields[0]->name}}</p>
                                                <img src="img/lightblue-button.png" alt="A blue triangular button">
                                            </div>
                            </a>
                            </li>
                            
                        @else
                            <li id="no-js-slider-{{$key}}" class="carousel-text__window--slide">
                         
                                    {!! $textfield->content !!}
                                <a class="prev prev-text" href="#no-js-slider-{{$key- 1 }}">
                                        <div class="carousel-text__button carousel-text__button--left">
                                                <img src="img/lightblue-button.png" alt="A blue triangular button">
                                                <p>{{$component->textfields[$key - 1]->name}}</p>
                                            </div>
                                
                                </a>
                                <a class="next next-text" href="#no-js-slider-{{$key + 1}}">
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
    
    <script>
        window.onload = function() {
            window.location.href = "#no-js-slider-0";
        }
    </script>
</section>
    
@endif
@endforeach--}}