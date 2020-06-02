@foreach($components as $component) 
    @if($component->name === 'main_text_display')
        <section class="main-text-display dropshadow-4">

                @isset($component->imagefields[0]->name)
                    <img src="img/{{$component->imagefields[0]->name . '.jpg'}}" alt="A background image" class="main-text-display__image main-text-display__image-full">
                @endisset
            
           

            @isset($component->imagefields[1]->name)
                <img src="img/retro-bar-1.svg" class="main-text-display__image main-text-display__image--retro-bar" alt="Een retro balk tussen twee afbeeldingen">
                <img src="img/{{$component->imagefields[1]->name . '.jpg'}}" alt="A background image" class="main-text-display__image main-text-display__image-full" >
            @endisset
         

            <div class="main-text-display__overlay">
                
                <div class="main-text-display__textfield">
                        <div class="main-text-display__textfield--background" id="main_textfield">
                            @isset($component->textFields[0]->content)
                                {!! $component->textFields[0]->content !!}
                            @endisset
                            
                   
                    @isset($component->imagefields[2]->name)
                        <img src="img/{{$component->imagefields[2]->name . '.jpg'}}" alt="An extra smaller image about the content of the page" class="main-text-display__image-extra">
                    @endisset

                </div>
            </div>
                         
            </div>
       

        
            {{--@if($quote)--}}
                <p>{{--$component->textFields[1]->content--}}</p>
            {{--@endif--}}

     
                
        </section>

    @endif
@endforeach


