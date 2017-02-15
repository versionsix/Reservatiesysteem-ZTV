@extends('base')

@section('title', 'Zitje Selecteren')

@section('content')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Zitje reserveren: {{$performance->play->name}}, {{$performance->date}} {{$performance->hour}}</h4></div>
            <div class="panel-body">
                <p>
                Op deze pagina kan je je zitje(s) selcteren die je wil reserveren.
                Klik de gewenste zitje(s) aan. Zodra je alle zitjes geselcteerd hebt klik je onderaan op volgende.</p>
                <p>
                Legenda kleuren:<br />
                - Groen: beschikbaar<br />
                - Rood: bezet<br />
                - Donkerblauw: geselecteerd</p>
            </div>
            <!--/panel-body-->
        </div>
        @include('seatplan.container', [
            ['seatsArr' => $seatsArr],
            ['editable' => $editable = 'false']])
        <div class="row">
            <div class="pull-left col-xs-offset-2">
                <span id="seatsCounter">Aantal zitjes geselecteerd: 0</span>
            </div>
        <div class="pull-right">
            <form role="form" method="POST" action="{{ url('/voorstelling/' . $performance->id . '/reserveer') }}">
                <input type="hidden" id="buttons_selected" name="buttons_selected" value="">
                {{ csrf_field() }}
            <button id="test" class="btn btn-lg btn-default">Volgende <span class="glyphicon glyphicon-arrow-right"></span></button>
            </form>
        </div>
        </div>

       <!-- <pre>{{ json_encode($seatsArr, JSON_PRETTY_PRINT) }}</pre> -->
    </div>
@endsection