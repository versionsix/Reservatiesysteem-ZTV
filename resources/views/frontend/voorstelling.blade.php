@extends('base')

@section('title', 'Zitje Selecteren')

@section('content')

    <div class="container">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Zitje reserveren: {{$performance->play->name}}, {{$performance->date}} {{$performance->hour}}</h4></div>
            <div class="panel-body">
                {!! $performance->page_content !!}
                <p>
                Op deze pagina kan je je zitje(s) selcteren die je wil reserveren.
                Klik de gewenste zitje(s) aan. Zodra je alle zitjes geselcteerd hebt klik je onderaan op volgende.</p>
                <p>
                Legenda kleuren:<br />
                - Groen: beschikbaar<br />
                - Rood: bezet<br />
                - Donkerblauw: geselecteerd</p>
            </div>
            <div class="panel-body">
                <div class="row">
                @include('seatplan.container', [
    ['seatsArr' => $seatsArr],
    ['editable' => $editable = 'false']])

                    <div class="col-xs-4 col-xs-offset-2">
                        <span id="seatsCounter">Aantal zitjes geselecteerd: 0</span>
                    </div>

                    <div class="col-xs-2"></div>
                    <div class="col-xs-2">
                        <form role="form" method="POST" action="{{ url()->current() }}">
                            <input type="hidden" id="buttons_selected" name="buttons_selected" value="">
                            {{ csrf_field() }}
                            <button id="test" class="btn btn-lg btn-default">Volgende <span class="glyphicon glyphicon-arrow-right"></span></button>
                        </form>
                    </div>
                </div>
            </div>
            <!--/panel-body-->
        </div>



    </div>
@endsection