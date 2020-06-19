@extends('layouts.main')

@section('page-title', 'dashboard')




@section('content')
    @parent

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

      <h1> Welcome back General </h1>

      <a href="page/create">Create a new page!</a>

      <a href="text_data/show">Change the text data!</a>

      <a href="component_module/show">Show component modules!</a>


      <ul>
        @foreach($pages as $page)
      <li>{{$page->name}} <a href="/page/edit/{{$page->id}}">Edit</a></li>
        @endforeach
      </ul>
    
    
    @stop