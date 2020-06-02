@extends('layouts.main')

@section('page-title', $page->name)



@section('content')
    @parent
        @include('components.header-banner-with-text')
        @include('components.retro-bar-small')
        @include('components.carousel-text')
        @include('components.retro-bar-small')
            <section    class="illustration-section"  
                        title="A beautiful light and dark blue background of two person riding a bike on a hill"
                        style=" background-image: url(img/bg-illustrations/bg-illustration-1.svg);                             
                                background-color: #A2EBFE;
                                padding-bottom: 30rem;">

                @include('components.centered-text')
                @include('components.contact-form')
        </section>

    @stop