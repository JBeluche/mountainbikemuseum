@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent


<h1 class="admin__dashboards--titles header-main__admin">Afbeeldingen</h1>

<p class="paragraph-big__dark admin__dashboards--info">Voeg een afbeelding toe om deze te gebruiken in componenten. De naam hoef niet hetzelfde te zijn als de bestandsnaam, het wordt later gebruik voor het kiezen van afbeeldingen.</p>



<div class="admin__imagedata--container">

@foreach ($images as $image)

@if($image->id > 1)
    <div class="admin__imagedata--item">
        <h3>{{$image->name}}</h3>
        <a class="paragraph-big__light admin__imagedata--delete" href="/image_data/delete/{{$image->id}}">Verwijderen</a>
    </div>
@endif
    
@endforeach

</div>

    <h2 class="u-margin-bottom-medium">Voeg afbeelding toe</h2>

    <a class="admin__green-button" href="/image_data/create">Nieuw afbeelding</a>
@stop