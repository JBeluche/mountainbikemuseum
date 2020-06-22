@extends('layouts.main')

@section('page-title', 'dashboard')




@section('content')
    @parent

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

{{--All custom modules here --}}

<ul>
    @foreach ($componentmodules as $module)
        @if ($module->is_custom === 1)
            <li>{{$module->name}}</li>
        @endif
    @endforeach
</ul>

<a href="component_module/create">Maak nieuwe module aan!</a>


    {{--List of all available modules here. Cannot be edited! --}}
    <ul>
        @foreach ($componentmodules as $module)
        @if ($module->is_custom === 0)
            <li>{{$module->name}}</li>
        @endif
    @endforeach
    </ul>
@stop
