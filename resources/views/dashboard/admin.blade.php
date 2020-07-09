@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent



      <a href="page/create">Create a new page!</a>

      <div class="admin__page--container">

        @foreach($pages as $page)

        <div class="admin__page--item"> 

           <h3>{{$page->name}}</h3>
            <p>{{$page->lang}}</p>
           
           <a class="admin__page--edit-link" href="/page/edit/{{$page->id}}">Edit</a>
           <a class="admin__page--delete-link" href="/page/delete/{{$page->id}}">Delete</a>

       </div> 

       @endforeach

      </div>



@stop