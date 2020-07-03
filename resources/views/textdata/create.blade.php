@extends('layouts.admin_main')

@section('page-title', 'Text data editor')





@section('content')
@parent

<div class="admin__textdatas-create--container">

    <form class="admin__textdatas-create--form" style="color:black;" action="/text_data/create" method="POST">
        @csrf
        <p>Naam text</p>
        <input type="text" class="admin__textdatas--name paragraph-medium__light" name="key_name"
            placeholder="Naam data text"> <br>

        <p>Category</p>
        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categoryname}}</option>
            @endforeach
        </select>
        <p class="paragraph-semibold-16__dark">Nederlands</p>
        <textarea class="paragraph-small__light" name="nl_text" placeholder="Nederlandse text"></textarea>
        <p class="paragraph-semibold-16__dark">Duits</p>
        <textarea class="paragraph-small__light" name="de_text" placeholder="Duitse text"></textarea>
        <p class="paragraph-semibold-16__dark">Engels</p>
        <textarea class="paragraph-small__light" name="en_text" placeholder="Engelse text"></textarea>

        <input class="u-margin-top-bottom-small admin__textdatas--save" type="submit" value="Opslaan">

    </form>


</div>




@stop