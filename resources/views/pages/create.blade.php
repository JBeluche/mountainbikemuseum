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

    <form method="POST" action="/page/create">
        @csrf
        <ul class="form-style-1">
            <li>
                <label>Page name<span class="required"></span></label>
                <input type="text" name="name" class="field-divided" placeholder="Page title" /> 
            </li>

            <br>

            <li>
                <label>Page language<span class="required"></span></label>
                  
                <select name="lang">
                    <option value="en">Engels</option>
                    <option value="de">Duits</option>
                    <option value="nl" selected>Nederlands</option>
            </select>
            
            </li>

            <br>

            <!--Get all navigation link-->
            <li>
                <label>Navigatie Link<span class="required"></span></label>
                  
                <select name="nav_link_id">
                    <option value="0" selected>Alleen staande link</option>

                        @foreach ($navlinks as $navlink)
                            <option value="{{$navlink->id}}">{{$navlink->name}} ({{$navlink->lang}})</option>
                        @endforeach
                    
            </select>

            </li>

        <br> 

            <li>
                <input type="submit" value="Maak pagina aan"/>
            </li>
        </ul>
        </form>

        <a href="navlink/create">Maak een nieuwe navigatie link aan</a>
        {{ csrf_field() }}

</body>
</html>