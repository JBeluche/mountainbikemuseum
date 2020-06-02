<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>


    <link  href="{{ asset('img/logo-icon.ico') }}" rel="shortcut icon" type="img/logo-icon"/>

    @stack('styles')

    <title>@yield('page-title')</title>
    
</head>
<body>

    @include('layouts.navbar')

    @yield('content')

    @include('layouts.footer')