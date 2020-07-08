@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent


{{--All custom modules here --}}

{{$module->name}}

<div class="admin__modules-edit--container">

    @isset($datafields)

    @foreach ($datafields as $datafield)

    <form form class="admin__modules-edit--forms" action="/component_module/edit/{{$module->id}}" method="POST">

        @csrf

        <input type="hidden" value="{{$datafield->id}}" name="datafield_id"> 

        <label for="index">Index</label>
        <input name="index" class="admin__input" type="numer" value="{{$datafield->index}}">

        <label for="tag">Tag</label>
        <select name="tag_id">
            @isset($tags)
            @foreach ($tags as $tag)
            <option value="{{$tag->id}}" {{$tag->id == $datafield->tag_id ? 'selected' : ''}}>{{$tag->name}}</option>
            @endforeach
            @endisset
        </select>


        <input class="admin__yellow-button" type="submit" name="save" value="Opslaan"> 
        <input class="admin__red-button" type="submit" name="destroy" value="Verwijderen">

    </form>

    @endforeach

    @endisset

    {{--Add and save data fields to module--}}
    <form class="admin__modules-edit--forms" action="/component_module/edit/{{$module->id}}" method="POST">

        @csrf

        <label for="tag">Index</label>
        <input name="index" type="numer" class="admin__input" placeholder="1">

        <label for="tag">Tag</label>
        <select name="tag_id">
            @isset($tags)

            @foreach ($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
            @endisset
        </select>

        <input type="submit" class="admin__green-button" name="add" value="Voeg veld toe"> <br><br>

    </form>
</div>



@stop