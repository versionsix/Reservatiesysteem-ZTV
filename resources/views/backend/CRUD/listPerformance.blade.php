@extends('base')

@section('title', 'Voorstellingen - Lijst')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Voorstellingen</h4>
                <a href="{{ action("BackendController@ShowPerformanceAdd") }}"
                   class="btn btn-primary btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Voeg
                    voorstelling toe</a>
            </div>
            <div class="panel-body">
                Op deze pagina kan je de voorstellingen aanpassen. Je kan zoveel voorstellingen toevoegen als je wil.
                <br/>
                @if (count($performance) == 0)
                    Sorry, geen gevonden. Voeg er een toe met de knop voeg toe.
                @endif
                @if (count($request->old()) > 0)
                    <div class="alert alert-success">
                        <ul>
                            {{ session('status') }}
                        </ul>
                    </div>
                @endif
                <br/>
                <h3>Toneelstuk: {{$play_active->name}}</h3>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Uur</th>
                        <th>Reservatieplan</th>
                        <th>Ingeschakeld</th>
                        <th colspan="2">Actie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($performance as $performance_item)
                        <tr>
                            <td>{{ $performance_item->date }}</td>
                            <td>{{ $performance_item->hour }}</td>
                            <td>{{ $performance_item->seatingType == 'fixed_seat_choice' ? "Vaste zit" : "Vrije toegang"}}</td>
                            <td>{{ $performance_item->enabled == 'true' ? "Ja" : "Nee"}}</td>
                            <td class="action"><a href="{{action('BackendController@ShowPerformanceEdit', $performance_item->id)}}"
                                                  class="btn btn-xs btn-primary"><span
                                            class="glyphicon glyphicon-edit"></span> Bewerk</a></td>
                            <td class="action"><a href="{{action('BackendController@ShowPerformanceDelete', $performance_item->id)}}"
                                                  class="btn btn-xs btn-danger"><span
                                            class="glyphicon glyphicon-remove"></span> Verwijder</a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
            <!--/panel-body-->
        </div>
        <!--/panel-->
    </div>
    @include('backend.bottom')
@endsection