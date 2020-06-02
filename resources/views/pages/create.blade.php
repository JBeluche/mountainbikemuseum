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

    <form method="POST" action="../pages">
        @csrf
        <ul class="form-style-1">
            <li>
                <label>Page<span class="required">*</span></label>
                <input type="text" name="title_page" class="field-divided" placeholder="Page title" /> 
            </li>

            <li>
                <ul>
                        <label>Component<span class="required">*</span></label>
                        
                        <select name="component-name">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="fiat" selected>Fiat</option>
                                <option value="audi">Audi</option>
                        </select>

                        <input type="text" name="content" class="field-divided" placeholder="Text field of component" /> 
                </ul>
            </li>
          
            <li>
                <input type="submit"/>
            </li>
        </ul>
        </form>
        {{ csrf_field() }}

</body>
</html>