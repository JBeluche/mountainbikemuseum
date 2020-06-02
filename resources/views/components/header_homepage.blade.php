


@foreach($components as $component)
 
       
              @if($component->name === 'header_home')
              <header       class="header-main" 
                            style="background-image:   
                                   url({{ isset($component->imagefields[0]->name) 
                                   ? ('img/' . $component->imagefields[0]->name) 
                                   : '' }})">
              
                     <img src="img/dot-effect-1.png" alt="A set of dot to create an nice effect over the header image" 
                            class="header-main__dots header-main__dots--left">
              
                            <h1 class="header-main__h1">{!! isset($component->textfields[0]->content) 
                                   ? ($component->textfields[0]->content) 
                                   : '' !!}</h1>
              
                     <img src="img/dot-effect-1.png" alt="A set of dot to create an nice effect over the header image" 
                     class="header-main__dots header-main__dots--right">
              
              </header>

         
       @endif
@endforeach






