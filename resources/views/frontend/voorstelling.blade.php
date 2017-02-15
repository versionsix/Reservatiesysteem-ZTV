@extends('base')

@section('title', 'Zitje Selecteren')

@section('content')

    <div class="container">
        @include('seatplan.container', [
            ['seatsArr' => $seatsArr],
            ['editable' => $editable = 'false']])



        <pre>{{ json_encode($seatsArr, JSON_PRETTY_PRINT) }}</pre>
    </div>
@endsection