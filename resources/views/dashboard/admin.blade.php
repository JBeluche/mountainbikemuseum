@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent

<h1 class="admin__dashboards--titles header-main__admin">Pagina overzichht</h1>

<p  class="paragraph-big__dark admin__dashboards--info">Pas op! <br> Als je op de knop verwijderen drukt dan wordt de pagina gelijk verwijdert! <br> Wil je een pagina terug krijgen? Neem dan contact op met de beheerder!</p>

<a style="display: block;" class="to-center-horizon u-margin-top-medium-big admin__green-button" href="page/create">Create a new page!</a>

      <div class="admin__page--container">

 

        @foreach($pages as $page)

            @if ($page->lang =='nl')
                
                  <div class="admin__page--item"> 

                        <div class="admin__page--show-info">
                              <h3 class="admin__page--show-title">{{$page->name}}</h3>
                        </div>
                  
                  <a class="admin__page--edit-link paragraph-big__light" href="/page/edit/{{$page->id}}">Edit</a>
                  <a class="admin__page--delete-link paragraph-big__light" href="/page/delete/{{$page->id}}">Delete</a>

                  </div> 
            @endif

      @endforeach

      </div>



@stop