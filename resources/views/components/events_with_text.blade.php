{{--
    * I was thinking about creating an array for this to put in the database 'content' cell
    * This way you can call the array events misschien
--}}
<section class="events-text-section" style="display: block;">

    
{{-- IK HEB EEN COMMENT GEMAAKT OM DE SIDEBAR WEG TE KRIJGEN
    DE FOREACH WAS AL GECOMMENT
    VERWIJDER DE CUSTOM STYLE HIERBOVEN
    
    <div class="sidebar sidebar__list">

        <h1 class="sidebar__title">
            {{ __('home.event_title') }}
        </h1>
        <div class="sidebar__list--wrapper u-margin-bottom-medium">
            {{-- @foreach ($listItems as $listitem)
            <div class="sidebar__list--item u-margin-bottom-medium">
                <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">{{ $listitem->content }}
            </li>
            <ul>
                @foreach ($listitem->childrenListItems as $childListItem)
                @include('child_listitem', ['child_listitem' => $childListItem])
                @endforeach

            </ul>
        </div>
        <br>
        @endforeach--}}

        {{--
        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                {{ __('home.event_1_title') }}</li>
            <ul>
                <li class="sidebar__list--item-child ">{{ __('home.event_1_text') }}</li>
            </ul>
        </div>
        <br>
        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                Bike Motion Utrecht (museum gesloten) </li>
            <ul>
                <li class="sidebar__list--item-child ">28 februari tot 1 maart</li>
            </ul>
        </div>
        <br>

        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                Gravelmania Arnhem</li>
            <ul>
                <li class="sidebar__list--item-child ">7 maart</li>
            </ul>
        </div>
        <br>

        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                {{ __('home.event_2_title') }}</li>
            <ul>
                <li class="sidebar__list--item-child ">{{ __('home.event_2_text') }}</li>
            </ul>
        </div>
        <br>

        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                {{ __('home.event_3_title') }}</li>
            <ul>
                <li class="sidebar__list--item-child ">{{ __('home.event_3_text') }}</li>
            </ul>
        </div>
        <br>
        
        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                World Cup Mountainbiken Vall Nord</li>
            <ul>
                <li class="sidebar__list--item-child ">21 juni</li>
            </ul>
        </div>
        <br>

        
        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                World Cup Mountainbiken Albstad</li>
            <ul>
                <li class="sidebar__list--item-child ">26, 27 en 28 juni</li>
            </ul>
        </div>
        <br>

        

        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                {{ __('home.event_4_title') }}</li>
            <ul>
                <li class="sidebar__list--item-child ">{{ __('home.event_4_text') }}</li>
            </ul>
        </div>
        <br>
        <br>
        
        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                World Cup Mountainbiken Lenzerheide</li>
            <ul>
                <li class="sidebar__list--item-child ">16 augustus</li>
            </ul>
        </div>
        <br>
        
        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                World Cup Mountainbiken Mont-Sainte-Anne</li>
            <ul>
                <li class="sidebar__list--item-child ">23 augustus</li>
            </ul>
        </div>
        <br>

        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                Airborne Ride </li>
            <ul>
                <li class="sidebar__list--item-child ">19 september</li>
            </ul>
        </div>
        <br>

        <div class="sidebar__list--item u-margin-bottom-medium">
            <li class="sidebar__list--item-heading paragraph-big__light u-margin-bottom-small">
                Kerstmarkt</li>
            <ul>
                <li class="sidebar__list--item-child ">13 december</li>
            </ul>
        </div>
        <br>
        

    </div>
    <div class="sidebar__bottom-content">
    <div class="sidebar__line"></div>

    <p class="sidebar__bottom-paragraph paragraph-big__light u-margin-bottom-medium">
        {{ __('home.events_note') }}
    </p>
    <a target="_blank" href="https://www.facebook.com/dutchmountainbikemuseum">
        <img src="img/facebook-square.svg" alt="Facebook Icon"></a>
    </div>
    </div>--}}

    <div class="sidebar-text-area">
         <h1 class="heading-1 u-margin-bottom-big">{{--{{ __('home.welcome_text_corona') }}  {{ __('home.welcome_text_title') }} --}}
            <span style="font-size: 3.5rem">
                
                SUPPORT TICKET: RIJDEN OP EEN MUSEUMBIKE 
            </span>

        </h1>

        <img src="img/support.jpg" alt="Een afbeelding van de support ticket" style="width: 100%; ">
        <br><br><br>

        <p class="paragraph-big__dark u-padding-sides-big u-margin-bottom-big">
          
          {{-- {{ __('home.welcome_text_1') }}<br><br>

            {{ __('home.welcome_text_2') }}<br><br>

            {{ __('home.welcome_text_3') }}<br><br>

            {{ __('home.welcome_text_4') }}<br><br>

            {{ __('home.welcome_text_5') }}<br><br>
            {{ __('home.welcome_text_6') }}--}} 



            Zoals iedereen weet, heeft de cultuur het zwaar. Alle musea moeten hun deuren sluiten. Zo ook wij, als klein particulier museum.   <br>
            Dit museum en haar collectie zijn eigenhandig opgebouwd door Jeroen van Roekel.  <br>
            Hij komt met een unieke actie: retro mountainbike liefhebbers kunnen het museum steunen door een support ticket te kopen. Hiermee steun je het museum, maar maak je tegelijkertijd kans op een rit op een écht museumstuk.  <br>
            En er staan wat pareltjes in de collectie! Van de echte klassieker Ritchey P21 tot een Slingshot of Cannondale Raven. Maar ook een aantal bijzondere titanium klassiekers zoals New proof of Merlin.  <br>
            En nog véél meer, aangezien er zo’n 160 merken uit een tijdspanne van 30 jaar in het museum zijn! Het doel is om op deze wijze ons museum, dat afhankelijk is van giften, financieel te steunen.  <br>
            In ruil daarvoor krijg je twee drankjes cadeau, die je hopelijk snel op het terras op kunt komen drinken.  <br>
            Dus: wil je ook steunen? Kijk hieronder wat je kunt doen. De actie loopt totdat het museum weer open is.  <br> <br>

            Vermeldt in de overboeking je naam en 'support ticket'. Stuur daarna een mailtje naar info@mountainbikemuseum.nl .  <br>
            Het ticket zal je z.s.m. door één van de vrijwilligers worden toegestuurd! Hou rekening met verwerkingstijd van één week. <br> <br>

            €10 | STICHTING MOUNTAINBIKE MUSEUM | Bank: NL83RABO0304852295 <br>
            

        </p>

    </div>


</section>