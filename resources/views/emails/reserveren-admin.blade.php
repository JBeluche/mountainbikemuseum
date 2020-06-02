@component('mail::message')

# Iemand heeft een fiets gehuurd bij het Mountainbike Museum. Bekijk de bestelling en neem contact met hem/haar op! 
<br><br>
Voorletters: {{$request['voorletters']}} <br> 
Tussenvoegsels:  {{$request['tussenvoegsel']}} <br>
Achternaam:  {{$request['achternaam']}} <br>
Type klant:  {{$request['type_klant']}} <br>
E-mail: {{$request['email']}} <br>
Telephoon: {{$request['telefoon']}} <br>

Land:  {{$request['land']}} <br>
Postcode: {{$request['postcode']}} <br>
Plaatsnaam:  {{$request['plaats']}} <br>
Straat:  {{$request['straatnaam']}} <br>
Huisnummer:  {{$request['huisnummer']}} <br>
Toevoeging:  {{$request['toevoeging']}} <br>

Aankomsttijd:  {{$request['aankomsttijd']}} <br>
Aankomst datuum:  {{$request['date']}} <br>
Duratie:  {{$request['duration']}} <br>

Opmerking:  {{$request['comment']}} <br>


Personen: <br>
    <?php $i = 0; ?>
    @foreach(Session::get('persons') as $persons)
        @foreach($persons as $person)
            Persoon {{$i + 1 . ': ' . $person}} meter <br>
            <?php $i++; ?>
        @endforeach
    @endforeach


@endcomponent