@component('mail::message')

# Iemand heeft contact opgenomen via het contactformulier van www.mountainbikemuseum.nl . Bekijk het bericht zo snel mogelijk! 
<br>
Vanuit de pagina: {{$request['page']}}<br><br>

Van: {{$request['name']}}<br>
Email: {{$request['email']}}<br>

Origineel bericht: <br>
{{$request['message']}}<br>

@endcomponent