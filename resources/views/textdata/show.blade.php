

@extends('layouts.main')

@section('page-title', 'Text data editor')





@section('content')
@parent

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <h1>Hier kun je de text data inzien</h1>

    <div style="background-color: #ABA9BF;">
        
    @foreach($textdatas as $textdata)
        <form style="background-color: ABA9BF;" action="POST">
            <br>
                Naam text
            <input type="text" placeholder="{{$textdata->key_name}}"> <br>
            NL <br>
            <input type="text" placeholder="{{$textdata->nl_text}}"><br>
            DE <br>
            <input type="text" placeholder="{{$textdata->de_text}}"><br>
            EN <br>
            <input type="text" placeholder="{{$textdata->en_text}}">

            <input type="submit" value="submit">

            <a href="/text_data/delete/{{$textdata->id}}">Delete</a>
        </form>
    @endforeach

<br><br>
    <h1>Voeg een nieuwe text data key shizzle toe</h1>
    <a href="/text_data/create">Klik hier</a>
</div>

@stop