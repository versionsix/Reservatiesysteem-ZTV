@extends('base')

@section('title', 'Toneelstukken - Lijst')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Toneelstukken</h4>
                <a href="{{ action("BackendController@ShowPlayAdd") }}"
                   class="btn btn-primary btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Voeg
                    toneelstuk toe</a>
            </div>
            <div class="panel-body">
                Sorry, geen gevonden. Voeg er een toe met de knop voeg toe.
            </div>
            <!--/panel-body-->
        </div>
        <!--/panel-->
    </div>
    @include('backend.bottom')
@endsection