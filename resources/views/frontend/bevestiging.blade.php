@extends('base')

@section('title', 'Reservatie bevestigd!')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Reservatie successvol!</h4></div>
            <div class="panel-body">
                <p>
                    U ontvangt een e-mail met de details van je reservatie.
                </p>
            </div>
        </div>
        <hr>
        {{ '<pre>' . json_encode($request->old( ), JSON_PRETTY_PRINT) . '</pre>' }}

    </div>
@endsection