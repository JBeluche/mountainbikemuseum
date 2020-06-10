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

    <h2>Pas elementen aan:</h2>

    @foreach ($textfields as $textfield)
        <input type="text" name="{{$textfield->id}}">
    @endforeach


</body>

</html>