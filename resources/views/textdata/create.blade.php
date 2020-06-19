
@extends('layouts.main')

@section('page-title', 'Text data editor')





@section('content')
@parent

    <br>
    <br>
    <br>
    <br>
    <br>

    <form style="color:black;" action="/text_data/create" method="POST" >
        @csrf
        <br>
            Naam text
        <input type="text" name="key_name" placeholder="Naam data text"> <br>

        <select name="category_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->categoryname}}</option>
            @endforeach
        </select>
        <br>
        NL <br>
        <input type="text" name="nl_text" placeholder="Nederlandse text"><br>
        DE <br>
        <input type="text" name="de_text" placeholder="Duitse text"><br>
        EN <br>
        <input type="text" name="en_text" placeholder="Engelse text">

        <input type="submit" value="submit">

    </form>



    @stop