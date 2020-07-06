@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent



{{--All custom modules here --}}

<div class="admin__modules--container">

    <div class="admin__modules--aanpasbaar-container">

        <h3>Lijst van aanpasbare modules</h3>

        @foreach ($componentmodules as $module)

        @if ($module->is_custom === 1)
        <div class="admin__modules--item">
            {{$module->name}}

            <form action="/component_module/edit/{{$module->id}}">
                @csrf
                <input class="admin__green-button" type="submit" value="Aanpassen">
            </form>
        </div>
        @endif

        @endforeach

        <form action="/component_module/create" method="POST">

            @csrf

            <h3>Maak een nieuwe module aan!</h3>
            <input class="admin__input" type="text" name="name" placeholder="Naam module">

            <select name="blueprint" id="">
                @foreach ($blueprints as $blueprint)
                    <option value="{{$blueprint->id}}">{{$blueprint->name}}</option>
                @endforeach
            </select>

            <input class="admin__green-button" type="submit" value="Nieuw module">

        </form>

    </div>

    {{--List of all available modules here. Cannot be edited! --}}
    <div>
        <h3>Lijst van beschikbaren modulen, niet aanpasbaar!</h3>
        <ul>
            @foreach ($componentmodules as $module)
            @if ($module->is_custom === 0)
            <li>{{$module->name}}</li>
            @endif
            @endforeach
        </ul>

    </div>

</div>



@stop