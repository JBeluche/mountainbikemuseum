@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent



{{--All custom modules here --}}

<div class="admin__modules--container">

    <div class="admin__modules--aanpasbaar-container">

        <h1 class="admin__dashboards--titles header-main__admin">Modulen</h1>

        <p class="paragraph-big__dark admin__dashboards--info">Maak hier je eigen modulen! Deze kun je daarna toevoegen
            aan elke pagina die je wilt.</p>



        <div class="u-margin-top-bottom-medium">

            <h3 class="header-third__admin u-margin-bottom-small">Maak een nieuwe module aan!</h3>
            <p class="paragraph-big__dark admin__dashboards--info u-margin-bottom-medium-small">Je moet daarbij een naam kiezen en een template. Vervolgens kun jij bepalen wat voor elementen erin komen!</p>

            <form class="admin__modules--aanmaak-formulier" action="/component_module/create" method="POST">

                @csrf

                <input class="admin__input" type="text" name="name" placeholder="Naam module">

                <select name="blueprint" id="">
                    @foreach ($blueprints as $blueprint)
                    <option value="{{$blueprint->id}}">{{$blueprint->name}}</option>
                    @endforeach
                </select>

                <input class="admin__green-button admin__modules--aanmaak-formulier--item-3" type="submit" value="Nieuw module">

            </form>
        </div>


        <div class="u-margin-top-bottom-medium">
            <h3 class="header-second__admin u-margin-bottom-medium-small">Pas op!</h3>
            <p class="paragraph-big__dark ">Als je een module verwijdert, dan worden alle componenten die deze module
                gebruiken verwijderet!</p>
        </div>
        <h3 class="header-second__admin">Lijst van aanpasbaar modulen!</h3>
        @foreach ($componentmodules as $module)

        @if ($module->is_custom === 1)
        <div class="admin__modules--item">
            <h3 class="header-third__admin u-margin-bottom-medium">{{$module->name}}</h3>

            <form action="/component_module/edit/{{$module->id}}">
                @csrf
                <input class="admin__green-button" type="submit" value="Aanpassen">
                <a class="admin__red-button" href="/component_module/delete/{{$module->id}}">Verwijderen </a>
            </form>
        </div>
        @endif

        @endforeach



        <h3 class="header-second__admin u-margin-top-medium-big">Lijst van beschikbaren modulen, niet aanpasbaar!</h3>

        @foreach ($componentmodules as $module)
        @if ($module->is_custom === 0)

        <div class="admin__modules--item">
            <h3 class="header-third__admin">{{$module->name}}</h3>
        </div>

        @endif
        @endforeach



    </div>

</div>



@stop