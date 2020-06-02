

@foreach($components as $component)

    @if  ($component->name === "long-card")

        <div class="long-card">

            <div class="long-card__gradient-decoration long-card__gradient-decoration--top long-card__gradient-decoration{{$component->textfields[0]->content}}"></div>

            <h1 class="long-card__title">{{$component->textfields[2]->content}}</h1>

            <div class="long-card__fold long-card__fold{{$component->textfields[0]->content}}">
                    <p class="long-card__price paragraph-big__light">{{$component->textfields[3]->content}}</p>
                </div>

                <ul class="long-card__list">    
                    @foreach ($component->listItems as $key => $listitem)
                        @if($key === count($component->listItems) - 1)
                            <li>{{$listitem->content}}</li>
                        @else
                        <li>{{$listitem->content}}</li>
                            <li><hr class="long-card__hr long-card__hr{{$component->textfields[0]->content}}"></li>
                        @endif

                    @endforeach
                </ul>
                <form class="long-card__form" action="/checkout" method="POST">
                    @csrf 
                    <input type="hidden" name="product_id" value="2">
                    <input type="hidden" name="page_title" value="{{ $page->name }}">
                    
                    <button class="long-card__button btn-gradient {{$component->textfields[1]->content}} paragraph-semibold-16__light">Klik hier</button>
                </form>

            <div class="long-card__gradient-decoration long-card__gradient-decoration--bottom long-card__gradient-decoration{{$component->textfields[0]->content}}"></div> 
        

        </div>
    @endif
@endforeach

