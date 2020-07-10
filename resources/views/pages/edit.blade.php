@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent

<h1 class="admin__dashboards--titles header-main__admin">Componenten</h1>

<p  class="paragraph-big__dark admin__dashboards--info">Pas op! <br> Kruisje verwijdert gelijk de component! <br> Deze is dan echt verwijdert! <br> 
    Het knopje opslaan is voor het bijwerken van de numering(index) van de componenten. <br>Wil je dus eentje helemaal bovenaan hebben, dan moet je deze op 1 zetten en opslaan. <br> Druk op bewerken om data toe te voegen aan je componeneten</p>

    <div class="admin__component--show-container">

        @foreach ($components as $component)

            
        <form class="admin__component--show-item" action="/component/edit/index/{{$component->id}}">
        <h2 class="admin__component--show-name"> {{$component->name}}</h2>

            <input type="number" name="index" class="admin__input" placeholder="{{$component->index}}">
            <input class="admin__component--show-save paragraph-big__light" type="submit" class="admin__green-button" value="Opslaan">
            
            <a class="admin__component--show-edit paragraph-big__light" href="/component/edit/{{$component->id}}">Bewerken</a> 
            <a class="admin__component--show-delete paragraph-big__light" href="/component/delete/{{$component->id}}"> <img src="/img/svg/close.svg" alt=""> </a>

        </form>
  
    
      
    @endforeach
    </div>
    


    {{--Add Component --}}

    <form class="admin__component--show-item" method="POST" action="/page/edit/{{$page->id}}">
        @csrf

        
        <span class="admin__component--show-span-1">Naam</span>
        <span class="admin__component--show-span-2">Module</span>
        <span class="admin__component--show-span-3">Index</span>
        <span class="admin__component--show-span-4"> </span>



        <select class="admin__component--show-module" name="componentModuleId">

            @foreach ($componentModules as $componentModule)
            <option value="{{$componentModule->id}}">{{$componentModule->name}}</option>
            @endforeach

        </select>

        <input class="admin__component--show-index-2" type="number" name="index" class="admin__input" placeholder="index">
        <input class="admin__component--show-name-2 admin__input" type="text" name="name" placeholder="Naam voor de pagina component">
        <input class="admin__component--show-save-2 admin__green-button" type="submit" name="add_component" value="Voeg component toe">
    </form>

    <form action="/page/updatefile/{{$page->id}}" method="GET">
        <input class="u-margin-top-bottom-medium admin__green-button" type="submit" name="page_refresh" value="Refresh">
    </form>
@stop