@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent

    <ul class="form-style-1">

        <h1>{{$page->name}}</h1>
    </ul>

    <ul>
        @foreach ($components as $component)
        <li>
            <h2> {{$component->name}}</h2><a href="/component/edit/{{$component->id}}">Edit Component</a> 
          
        </li>
        @endforeach
    </ul>


    {{--Add Component --}}

    <form method="POST" action="/page/edit/{{$page->id}}">
        @csrf

        <select name="componentModuleId">

            @foreach ($componentModules as $componentModule)
            <option value="{{$componentModule->id}}">{{$componentModule->name}}</option>
            @endforeach

        </select>

        <input class="admin__input" type="text" name="name" placeholder="Naam voor de pagina component">
        <input class="admin__green-button" type="submit" value="Voeg component toe">
    </form>

@stop