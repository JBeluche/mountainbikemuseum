
<li class="sidebar__list--item-child ">{{ $childListItem->content }}</li>
@if ($childListItem->listItems)
    <ul>
        @foreach ($childListItem->listItems as $childListItem)
            @include('child_lisitem', ['child_lisitem' => $childListItem])
        @endforeach
    </ul>
@endif