<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Icon -->
    <link rel="icon" href="{{ url('favicon2.png') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

@extends('adminlte::page')

<!-- {{-- Extend and customize the browser title --}} -->

@section('title')
    {{ config('adminlte.title') }}
    @hasSection('subtitle') | @yield('subtitle') @endif
@stop

<!-- {{-- Extend and customize the page content header --}} -->

@section('content_header')
    @hasSection('content_header_title')
        <h1 class="text-muted">
            @yield('content_header_title')

            @hasSection('content_header_subtitle')
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    @yield('content_header_subtitle')
                </small>
            @endif
        </h1>
    @endif
@stop

<!-- {{-- Rename section content to content_body --}} -->

@section('content')
    @yield('content_body')
@stop

<!-- {{-- Create a common footer --}} -->

@section('footer')
    <div class="float-right">
        Version: {{ config('app.version', '1.0.0') }}
    </div>

    <strong>
        <a href="{{ config('app.APP_URL', 'https://netshiba.com') }}">
            {{ config('app.APP_NAME', 'Netshiba') }}
        </a>
    </strong>
@stop

<!-- {{-- Add common Javascript/Jquery code --}} -->

@push('js')
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>
@endpush

<!-- {{-- Add common CSS customizations --}} -->

@push('css')
<style type="text/css">
.sidebar {
    display: flex;
    flex-direction: column;
    height: 100%;
}

.sidebar-menu {
    flex-grow: 1;
}

.sidebar-footer {
    padding: 100px;
    text-align: center;
    color: red; /* Letras en rojo */
    background-color: red; /* Fondo en rojo */
    border: 2px solid red; /* Marco rojo */
}

.sidebar-footer a {
    color: red ;
    text-decoration: none;
}

.sidebar-footer a:hover {
    text-decoration: underline;
}

</style>
@endpush