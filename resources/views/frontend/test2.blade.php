@extends('base')

@section('title', 'Contactpagina')

@section('content')
    <div class="container">
        <pre>{{json_encode($data, JSON_PRETTY_PRINT)}}



</pre>
</div>
@endsection