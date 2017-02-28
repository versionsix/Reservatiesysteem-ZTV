@extends('base')

@section('title', 'Toneelstukken - Lijst')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Reservaties
                    @if($filtered)
                    "{{ $reservationCustomer[0]->seatReservation[0]->performance->date }}
                    {{ $reservationCustomer[0]->seatReservation[0]->performance->hour }}"
                        @endif
                    </h4>
                <div class="dropdown pull-right">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Filter voorstelling
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        @foreach($performance as $performance_item)
                            <li><a href="{{action('BackendController@ShowPerformanceReservation', $performance_item->id)}}">{{$performance_item->date}} {{$performance_item->hour}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="panel-body">
                Op deze pagina kan je de reservaties aanpassen. Het aanpassen van de zitjes is niet mogelijk. Je moet
                altijd de volledige reservatie verwijderen.
                <br/>
                @if (count($reservationCustomer) == 0)
                    Sorry, geen gevonden. Voeg er een toe met de knop voeg toe.
                @endif
                @if (session('status') != null)
                    <div class="alert alert-success">
                        <ul>
                            {{ session('status') }}
                        </ul>
                    </div>
                @endif
                <br/>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Voornaam</th>
                        <th>Achternaam</th>
                        @if(!$filtered)
                        <th>Voorstelling</th>
                        @endif
                        <th>Zitje(s)</th>
                        <th>Actie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($reservationCustomer as $reservationCustomer_item)
                        <tr>
                            <td>{{ $reservationCustomer_item->firstName }}</td>
                            <td>{{ $reservationCustomer_item->surName }}</td>
                            @if(!$filtered)
                            <td>{{ $reservationCustomer_item->seatReservation[0]->performance->date }}
                                {{ $reservationCustomer_item->seatReservation[0]->performance->hour }}</td>
                            @endif
                            <td>
                                @foreach($reservationCustomer_item->seatReservation as $seatReservation)
                                    {{$seatReservation->seat->seatNumber}},
                                @endforeach
                            </td>
                            <td class="action"><a
                                        href="{{action('BackendController@ShowReservationEdit', $reservationCustomer_item->id)}}"
                                        class="btn btn-xs btn-primary no-print"><span
                                            class="glyphicon glyphicon-edit"></span> Bewerk</a></td>
                            <td class="action"><a
                                        href="{{action('BackendController@ShowReservationEdit', $reservationCustomer_item->id)}}"
                                        class="btn btn-xs btn-danger no-print"><span
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