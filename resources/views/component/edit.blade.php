<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('style.css') }}" rel="stylesheet">
    <title>Add Page</title>
</head>

<body>

    <h1>{{$component->name}}</h1>

    <h2>Voeg elementen toe voor dit component:</h2>

    <select name="element">
        <option value="textfield">Textfield</option>
        <option value="imageField">Af</option>
    </select>

</body>

</html>