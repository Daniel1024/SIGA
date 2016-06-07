@extends('layouts.admin')

@section('title', $title)

@section('titulo')
    <h1>{{ $titulo }}</h1>
@stop
@section('content')
    <div class="panel panel-default">
        <div class="panel-body full-height">
        @foreach($items as $item)
            <div class="item-principal">
                <a href="{{ $item['url'] }}">
                    <i class="fa {{ $item['icono'] }}" aria-hidden="true"></i>
                    <h2>{{ $item['nombre'] }}</h2>
                </a>
            </div>
        @endforeach
        </div>
    </div>
@stop