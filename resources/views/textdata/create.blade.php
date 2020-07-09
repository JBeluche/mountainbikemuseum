@extends('layouts.admin_main')

@section('page-title', 'Text data editor')





@section('content')
@parent

<h1 class="admin__dashboards--titles header-main__admin">Text data aanmaken</h1>

<p  class="paragraph-big__dark admin__dashboards--info padding-sides-6rem u-margin-top-bottom-medium">Let op! <br> De naam mag geen spacies bevaten! <br>Verder kun je een category toewijzen om het overzichtilijker als je de text terug zoekt. Het is handig om een pagina als category te gebruiken.</p>



<div class="admin__textdatas-create--container">

    <form class="admin__textdatas-create--form" style="color:black;" action="/text_data/create" method="POST">
        @csrf

        
        <div class="admin__textdatas-create--item">
        <p>Naam text</p>
        <input type="text" class="admin__textdatas--name paragraph-medium__light" name="key_name"
            placeholder="Naam data text"> <br>
        </div>

        
        <div class="admin__textdatas-create--item">
        <p>Category</p>
        <select class="admin__dropdowns" name="category_id">
            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->categoryname}}</option>
            @endforeach
        </select>
        </div>

        <div class="admin__textdatas-create--item">
            <p class="paragraph-semibold-16__dark">Nederlands</p>
            <textarea class="admin__textdatas--item--textarea paragraph-small__light" name="nl_text"
                placeholder="Nederlandse text"></textarea>
        </div>

        <div class="admin__textdatas-create--item">
            <p class="paragraph-semibold-16__dark">Duits</p>
            <textarea class="admin__textdatas--item--textarea paragraph-small__light" name="de_text"
                placeholder="Duitse text"></textarea>
        </div>

        <div class="admin__textdatas-create--item">
            <p class="paragraph-semibold-16__dark">Engels</p>
            <textarea class="admin__textdatas--item--textarea paragraph-small__light" name="en_text"
                placeholder="Engelse text"></textarea>
        </div>

        <input class="u-margin-top-bottom-small admin__green-button" type="submit" value="Opslaan">

    </form>


</div>




@stop