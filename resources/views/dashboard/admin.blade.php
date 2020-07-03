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
           
           <a href="/page/edit/{{$page->id}}">Edit</a>

       </div> 

       @endforeach

      </div>



@stop