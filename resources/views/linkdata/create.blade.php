@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent



<h1 class="admin__dashboards--titles header-main__admin">Link toevoegen</h1>

<p class="paragraph-big__dark admin__dashboards--info">Voeg een link toe om deze te gebruiken in componenten.</p>


<div class="admin__imagedata--file-form--wrapper">
    <form enctype="multipart/form-data" class="admin__imagedata--file-form" action="/link_data/create" method="POST">
        @csrf
        <input class="admin__input" name="name" type="text" placeholder="Geef hier een naam...">
        <input class="admin__input" name="link_name" type="text" placeholder="Exacte link typen...">
        <input class="admin__green-button" type="submit" value="Opslaan" name='file_save'>
    </form>
    
</div>


@stop