@extends('layouts.main')

@section('page-title', $page->name)





@section('content')
    @parent

        <section    class="illustration-section missie-visie"  
                    title="A beautiful red/orange background illustration of a bike riding a hill"
                    style=" background-image: url(img/bg-illustrations/bg-illustration-2.svg);                             
                            background-color: #FF7A76;">

            @include('components.banner-full')
            @include('components.retro-bar-small')

            @include('components.text-card-1-left')
            @include('components.text-card-1-right')

        

        </section>
    
    @stop