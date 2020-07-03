@extends('layouts.admin_main')

@section('page-title', 'Text data editor')





@section('content')
@parent


<h1>Hier kun je de text data inzien</h1>

<p>Filter:</p>
<form action="/text_data/show" method="POST" class="admin__textdatas--filter-container">
@csrf
    <select name="filter_id">
            <option value="" selected>Selecteer category</option>
        @foreach ($text_categories as $category)
            <option value="{{$category->id}}">{{$category->categoryname}}</option>
        @endforeach
    </select>

    <input value="Filter" class="admin__textdatas--filter-button" name="filter" type="submit">
</form>

<h1>Voeg een nieuwe text data key shizzle toe</h1>
<a href="/text_data/create">Klik hier</a>

<div class="admin__textdatas--container" >

    @foreach($textdatas as $textdata)
        <form class="admin__textdatas--item" action="/text_data/edit/{{$textdata->id}}" method="POST">

            @csrf

            <h3>Naam text</h3>
            <input name="key_name" class="admin__textdatas--name paragraph-medium__light" type="text" value="{{$textdata->key_name}}">

            <select name="category_id">
                    @foreach ($text_categories as $category)
                    <option  {{$textdata->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->categoryname}}</option>
                    @endforeach
            </select>

            <p class="paragraph-semibold-16__dark">Nederlands</p> 
            <textarea class="paragraph-small__light" name="nl_text" type="text">{{$textdata->nl_text}}</textarea>
            <p class="paragraph-semibold-16__dark">Duits</p>
            <textarea class="paragraph-small__light" name="de_text" type="text">{{$textdata->de_text}}</textarea>
            <p class="paragraph-semibold-16__dark">Engels</p>
            <textarea  class="paragraph-small__light" name="en_text" type="text">{{$textdata->en_text}}</textarea>

            <input class="u-margin-top-bottom-small admin__textdatas--save" type="submit" value="Opslaan">
            
            <a class="admin__textdatas--delete" href="/text_data/delete/{{$textdata->id}}">Verwijderen</a>
        </form>
    @endforeach

</div>




@stop