<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <title>Add Page</title>
</head>
<body>

        <ul class="form-style-1">
         
            <h1>{{$page->name}}</h1>
        </ul>

        <ul>
            @foreach ($components as $component)
        <form action="POST">
           
                    <li>{{$component->name}}</li>
            
                    @endforeach
                </form>
    </ul>
    

        {{--Add Component --}}

        <form method="POST" action="/page/edit/{{$page->id}}">
        @csrf
            
            <select name="componentListItemId">
        
                @foreach ($componentList as $componentListItem)
                    <option value="{{$componentListItem->id}}">{{$componentListItem->name}}</option>
                @endforeach
                
            </select>

            <input type="text" name="name" placeholder="Naam voor de pagina component">
            <input type="submit" value="Voeg component toe">
        </form>


</body>
</html>