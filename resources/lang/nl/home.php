<?php


$textsdata = App\TextData::all();
$data = array();

foreach($textsdata as $textdata){
    $data[$textdata->key_name] = $textdata->text;
}


return $data;

/*
return [


    'welcome_1' => 'Mountainbike Museum,',
    'welcome_2' => 'ons museum!',

    //Events
    'event_title' => 'EVENEMENTEN 2020',
    'event_1_title' => 'Monthly Ride!',
    'event_1_text' => ' 5 januari, 2 februari, 5 april, 3 mei, 7 juni, 5 juli, 2 augustus, 6 september 4 oktober, 1 november, 6 december!',
    'event_2_title' => 'NL Doet!',
    'event_2_text' => ' vrijdag 13 en zaterdag 14 maart',
    'event_3_title' => 'Opschoonrit!',
    'event_3_text' => ' zaterdag 21 maart',
    'event_4_title' => '5 jaar Mountainbike Museum: Choose to Move!',
    'event_4_text' => '12 juli',
    
    'events_note' => 'Voor de huidige data en tijden
    raden we u aan onze Facebook-pagina en evenementen te bezoeken!',
    
    'welcome_text_title' => 'Welkom op onze website',
    'welcome_text_1' => 'Het Mountainbike Museum is een initiatief van Jeroen van Roekel.
    Na jarenlang mountainbikes verzamelen, kon Jeroen eindelijk zijn droom realiseren.
    Door een grote passie voor zijn favoriete sport ontstond in de jaren ’90 namelijk al het idee voor een
    Mountainbike Museum.',
    'welcome_text_2' => 'Een museum dat Jeroen heeft opgezet met zijn persoonlijke collectie mountainbikes, een collectie die vandaag
    de dag nog steeds groeit.',
    'welcome_text_3' => 'Zonder subsidies, maar met hulp, passie en doorzettingsvermogen is het museum uiteindelijk gerealiseerd. 12
    juli 2015
    opende het Mountainbikemuseum in Arnhem vol trots zijn deuren met behulp van Olympisch kampioen Bart
    Brentjens.',
    'welcome_text_4' => 'Het doel van het museum is om zoveel mogelijk mensen kennis te laten maken met mountainbiken. Dat maakt het
    óns museum.
    Een museum voor en door iedereen.',
    'welcome_text_5' => 'In het museum zijn honderden fietsen te bezichtigen. Ook is in het museum inmiddels een trailcenter
    gerealiseerd.
    Het is de perfecte plek voor de start of finish van je ride. Daarnaast is er ook veel mountainbike
    memorabilia te bezichtigen.',
    'welcome_text_6' => 'Een must-see voor elke mountainbiker en liefhebber van de sport!',
    'welcome_text_corona' => 'WE ZIJN TOT NADER BERICHT GESLOTEN.',

    




];*/