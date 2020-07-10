@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent



<h1 class="admin__dashboards--titles header-main__admin">Afbeelding toevoegen</h1>

<p class="paragraph-big__dark admin__dashboards--info">Voeg een afbeelding toe om deze te gebruiken in componenten. De naam hoef niet hetzelfde te zijn als de bestandsnaam, het wordt later gebruik voor het kiezen van afbeeldingen.</p>


<div class="admin__imagedata--file-form--wrapper">
    <form enctype="multipart/form-data" class="admin__imagedata--file-form" action="/image_data/create" method="POST">
        @csrf
        <input class="admin__input" name="name" type="text" placeholder="Geef hier een naam...">
        <input class="admin__fileupload" name="file" type="file">
        <input class="admin__green-button" type="submit" value="Opslaan" name='file_save'>
    </form>
    
</div>


@stop