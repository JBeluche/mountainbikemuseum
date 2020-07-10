@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent


<h1 class="admin__dashboards--titles header-main__admin">Links</h1>

<p class="paragraph-big__dark admin__dashboards--info">Voeg een link toe om deze te gebruiken in componenten.</p>



<div class="admin__imagedata--container">

@foreach ($links as $link)

    <div class="admin__imagedata--item">
        <h3>{{$link->name}}</h3>
        <a class="paragraph-big__light admin__imagedata--delete" href="/link_data/delete/{{$link->id}}">Verwijderen</a>
    </div>

    
@endforeach

</div>

    <h2 class="u-margin-bottom-medium">Voeg een link toe</h2>

    <a class="admin__green-button" href="/link_data/create">Nieuw link</a>
@stop