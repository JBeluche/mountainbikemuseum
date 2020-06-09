@extends('layouts.main')

@section('page-title', $page->name)





@section('content')
@parent

@include('components/header_homepage')

@include('components.retro-bar-thick')


{{--Adding binnenkort weer open section --}}

<div class="reopening-container">

    <img src="img/re-opening banner.jpg" alt="Een afbeelding van de support ticket" style="width: 100%; ">

    <p class="u-margin-top-big paragraph-big__dark u-padding-sides-big u-margin-bottom-big">
        Het Mountainbike Museum opent zijn deuren weer op 4 juli 2020! Er wordt gewerkt aan maatregelen en eventueel een reserveringssysteem. <br>
        Totdat het museum weer opengaat, kunnen jullie nog steeds een supportticket aanschaffen om het museum te steunen. <br>
        Volg de website en social media om op de hoogte te blijven van de laatste ontwikkelingen! <br>
        <br>
        Team Mountainbike Museum
    </p>

</div>




@include('components.events_with_text')



@stop