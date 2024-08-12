@extends('adminlte::page')

@section('title', 'Game Details')

@section('content_header')
    <h1>{{ $game->name }}</h1>
@stop

@section('content')
    <p>{{ $game->description }}</p>
    <p>Logo: <img src="{{ $game->logo }}" alt="{{ $game->name }} Logo"></p>
    <p>Background: <img src="{{ $game->background }}" alt="{{ $game->name }} Background"></p>
    <p>Hex Color: {{ $game->hex_color }}</p>
@stop