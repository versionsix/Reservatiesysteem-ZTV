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

                <p>Gereserveerde zitje(s) zijn aangeduid met blauw</p>
                <div class="row">
                @include('seatplan.container', [
                    ['seatsArr' => $seatsArr],
                    ['editable' => $editable = 'bevestiging']])
                </div>
            </div>
        </div>
        {{-- <hr> --}}
       {{-- <pre>{{ json_encode($token, JSON_PRETTY_PRINT) }}</pre> --}}

    </div>
@endsection