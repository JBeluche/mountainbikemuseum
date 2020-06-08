<nav class="nav">
    {{--Logo SVG--}}   
        <div class="nav__img">
            <a class="nav__header-link" href="/">
            <img src="{{ asset('img/logo.png') }}" alt="Logo of the mountainbike museum!">
        </a>
        </div>

    {{--Navigation Items--}}

    <div class="nav__link-container">

     
        {{-------------
        **  This is a ugly way t odisplay all the language (Code can be shorter)
        --------------}}
        <div class="nav__item hide-on-ham dropdown"> 
            @if(Session::get('lang') === 'de')
                <a href="/language/1" class="dropdown__btn"><img src="/img/svg/german-flag.svg" class="dropdown__content--flag-image" alt="Image of the german flag"></a>

                <div class="dropdown__content dropdown__content--flag">
                    <a href="/language/2"><img src="/img/svg/uk-flag.svg" class="dropdown__content--flag-image" alt="Image of the dutch flag"></a>
                    <a href="/language/3"><img src="/img/svg/dutch-flag.svg" class="dropdown__content--flag-image" alt="Image of the dutch flag"></a>
                </div>
            @elseif(Session::get('lang') === 'en')
                <a href="/language/2" class="dropdown__btn"><img src="/img/svg/uk-flag.svg" class="dropdown__content--flag-image" alt="Image of the english flag"></a>

                <div class="dropdown__content dropdown__content--flag">
                    <a href="/language/3"><img src="/img/svg/dutch-flag.svg" class="dropdown__content--flag-image" alt="Image of the dutch flag"></a>
                    <a href="/language/1"><img src="/img/svg/german-flag.svg" class="dropdown__content--flag-image" alt="Image of the german flag"></a>
                </div> 
            @elseif(Session::get('lang') === 'nl')
                <a href="/language/3" class="dropdown__btn"><img src="/img/svg/dutch-flag.svg" class="dropdown__content--flag-image" alt="Image of the dutch flag"></a>

                <div class="dropdown__content dropdown__content--flag">
                    <a href="language/2"><img src="/img/svg/uk-flag.svg" class="dropdown__content--flag-image" alt="Image of the english flag"></a>
                    <a href="language/1"><img src="/img/svg/german-flag.svg" class="dropdown__content--flag-image" alt="Image of the german flag"></a>
                </div>
            @endif
        </div>

    {{--Here I loop through all the navlink elements. First I check if there is more than one page for that navlink to decide if they need to be grouped into a dropdown--}}
    @foreach ($navLinks as $navLink)

    @if ($navLink->pages->count() > 1)

    {{ $activeUrl = false  }}
        {{--Check if the acitve url is in the array, then sets the actuveurl to true--}}
        @foreach($navLink->pages as $page)   
             @if(Request::is($page->name))
                    <?php  $activeUrl = true ?>
                      
            @endif 
        @endforeach
            
        {{--If the active url is true the nav__item will be set to active--}}
    <div id="dropdown_event" class="nav__item hide-on-ham dropdown  {{ $activeUrl ? 'nav__item--active' : ''}} "> 

                <a  class="dropdown__btn">{{ $navLink->name }}</a>

                <div class="dropdown__content">

                    @foreach($navLink->pages as $page)                            
                        <a href="/{{ $page->name }}">{{ $page->name }}</a>
                    @endforeach

                </div>
            </div>


    @elseif ($navLink->pages->count() == 1)
        @foreach($navLink->pages as $page)           
            <a class="hide-on-ham {{  Str::lower(Request::segment(1)) === Str::lower($page->name) ? 'nav__item--active nav__item' : 'nav__item' }}" href="/{{ $page->name }}"> {{ $page->name }} </a>
        @endforeach
        
    @endif

@endforeach



@guest

        
        @if (Route::has('register'))
                <a class="hide-on-ham {{ Request::is('Login') ? 'nav__item--active nav__item' : 'nav__item' }}" href="{{ route('register') }}">{{ strtoupper(__('auth.register')) }}</a>
        @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle hide-on-ham {{ Request::is('dashboard') ? 'nav__item--active nav__item' : 'nav__item' }}" href="/dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
          {{strtoupper("Dashboard")}}<span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right logout-link" aria-labelledby="navbarDropdown">
            <a class="dropdown-item " href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ strtoupper(__('auth.logout')) }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endguest

<div class="nav__item hide-on-ham" data-children-count="0"> 
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php Request::url(); ?>" target="_blank" class="dropdown__btn"><img class="dropdown__content--flag-image" alt="Image of the dutch flag" src="/img/share.svg" style="width: 1.75rem;"></a>
</div>


        <div class="nav__hamburger">
            <label for="toggle" class="nav__ham-toggle-label">&#9776;</label>   
        </div>
       

    </div>


    <input type="checkbox" id="toggle"> 
    <div class="nav__ham-menu">

        {{--STARTING THE HAMBURGER MENU HERE!--}}
   
          {{--Here I loop through all the navlink elements. First I check if there is more than one page for that navlink to decide if they need to be grouped into a dropdown--}}
          @foreach ($navLinks as $navLink)

          @if ($navLink->pages->count() > 1)
 
          {{ $activeUrl = false  }}
              {{--Check if the acitve url is in the array, then sets the actuveurl to true--}}
              @foreach($navLink->pages as $page)   
                   @if(Request::is($page->name))
                          <?php  $activeUrl = true ?>
                            
                  @endif 
              @endforeach
                  
              {{--If the active url is true the nav__item will be set to active--}}
          <div class="nav__item nav__ham-link dropdown  {{ $activeUrl ? 'nav__item--active' : ''}} "> 

                      <a class="dropdown__btn">{{ $navLink->name }}</a>

                      <div class="dropdown__content">

                          @foreach($navLink->pages as $page)                            
                              <a href="/{{ $page->name }}">{{ $page->name }}</a>
                          @endforeach

                      </div>
                  </div>


          @elseif ($navLink->pages->count() == 1)
              @foreach($navLink->pages as $page)           
                  <a class=" nav__ham-link {{  Str::lower(Request::segment(1)) === Str::lower($page->name) ? 'nav__item--active nav__item' : 'nav__item' }}" href="/{{ $page->name }}"> {{ $page->name }} </a>
              @endforeach
              
          @endif

      @endforeach



      @guest

              
              @if (Route::has('register'))
                      <a class=" nav__ham-link {{ Request::is('Login') ? 'nav__item--active nav__item' : 'nav__item' }}" href="{{ route('register') }}">{{ strtoupper(__('auth.register')) }}</a>
              @endif
      @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle nav__ham-link {{ Request::is('dashboard') ? 'nav__item--active nav__item' : 'nav__item' }}" href="/dashboard" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{strtoupper("Dashboard")}}<span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right logout-link" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item " href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ strtoupper(__('auth.logout')) }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest

      <a class=" nav__ham-link" style="width: 1.75rem;" href="https://www.facebook.com/sharer/sharer.php?u=<?php Request::url(); ?>">
        <img src="/img/share.svg"  alt="">
    </a>

  
    </div>

    
</nav>





