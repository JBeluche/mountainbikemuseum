@extends('layouts.admin_main')

@section('page-title', 'dashboard')




@section('content')
@parent


<h1 class="admin__title">Component Editor</h1>

<p>
    Hier kun je aanpassing maken op de huidige component. Deze component is gekoppelt aan de {{$page->name}} pagina.
</p>

    <h1>{{$component->name}}</h1>

    <h2>Pas elementen aan:</h2>

    {{--Get all components fields, filter them by index
        for text you need a dropdown with all textdatas
        for images you need a dropdown for all images
        --}}
        <form action="/component/edit/{{$component->id}}" method="POST" >
            <div class="admin__tile-form">
            
            @foreach($datafields as $datafield)

            @foreach ($datalinks as $datalink)
            @csrf

            @if ($datafield->id == $datalink->field_id)
                
            <div>
  
                    
                   

                        @foreach ($tags as $tag)
                            @if ($tag->id == $datafield->tag_id)

                                <h3>{{$tag->name}}</h3>

                            @endif
                        @endforeach

                        @if ($datalink->data_type == 'text')

                        <select name="textdata[]" id='{{$datalink->id}}'>
                                @foreach ($textdatas as $textdata)
                                    <option {{$datalink->textdata_id == $textdata->id ? 'selected' : ''}} value="textdata_id={{$textdata->id}}&datalink_id={{$datalink->id}}">{{$textdata->key_name}}</option>
                                @endforeach
                            </select>
                            
                        @elseif ($datalink->data_type == 'img')
                            <select name="imagedata[]">
                                @foreach ($imagedatas as $imagedata)
                                    <option {{$datalink->imagedata_id == $imagedata->id ? 'selected' : ''}} value="imagedata_id={{$imagedata->id}}&datalink_id={{$datalink->id}}">{{$imagedata->filename}}</option>
                                @endforeach
                            </select>

                        @endif

                
                    </div>
            @endif

                @endforeach
                @endforeach
            </div>

    <input type="submit" name="component_edit" value="Opslaan" class="admin__green-button">
    
</form>

<img src="" alt="">



@stop