@extends('layouts.main')

@section('page-title', $page->name)





@section('content')
    @parent
    @include('components.carousel')

    
    
    @stop