@extends('layouts.main')

@section('page-title', $page->name)





@section('content')
@parent

@include('components/header_homepage')

@include('components.retro-bar-thick')


{{--Adding binnenkort weer open section --}}

<div class="reopening-container">

    <img src="img/re-opening banner.jpg" alt="Een afbeelding van de support ticket" style="width: 100%; ">

    <h1 class="heading-1 u-margin-bottom-big u-margin-top-big">
        WIJ GAAN WEER OPEN

    </h1>
    

    <p class="u-margin-top-big paragraph-big__dark u-padding-sides-big u-margin-bottom-big">
        Het is eindelijk zo ver! Het Mountainbike Museum gaat weer open op 4 juli 2020. Wij kunnen niet wachten! We hebben echter wel een aantal maatregelen opgesteld voor jullie en onze veiligheid. <br>
        De maatregelen lees je <a target="blank" class="link" href="/pdf/CoronamaatregelenMountainbikeMuseum.pdf">hier</a>. Reserveren voor een bezoek kan vanaf zondag 21 juni via 
        <a target="blank" class="link" href="https://apc01.safelinks.protection.outlook.com/?url=https%3A%2F%2Fwww.eventbrite.nl%2Fo%2Fmountainbike-museum-30523003796&data=02%7C01%7C%7Ccf4a418a6c0c432ca56e08d8143449f6%7C84df9e7fe9f640afb435aaaaaaaaaaaa%7C1%7C0%7C637281562521163480&sdata=2WF8nyPVfi%2F06F%2FM6m%2FtKIjUajHUgZRDQnN5NeY0usg%3D&reserved=0">
            EventBrite</a>! Elke maand maken we nieuwe evenementen aan. <br><br>

        Wil je het museum steunen? Koop dan een support ticket (zie onder) of doe een donatie. 
<br><br>
        Tot snel! <br><br>

        Team Mountainbike Museum 

    </p>

</div>




@include('components.events_with_text')



@stop