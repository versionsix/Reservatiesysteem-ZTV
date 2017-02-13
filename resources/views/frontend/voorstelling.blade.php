@extends('base')

@section('title', 'Contactpagina')

@section('content')
    <div class="container">
        {{ json_encode($performance) }}
    </div>
@endsection