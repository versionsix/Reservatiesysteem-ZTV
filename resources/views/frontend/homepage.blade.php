@extends('base')

@section('title', 'Homepage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Zammelse Toneel Vrienden </h1>
                <p class="lead">Welkom op de pagina van de toneelreservaties. Hieronder is een overzicht van de data.
                    Selecteer je datum en vervolgens kan je je zitplaats selecteren. Je krijgt per mail een
                    bevestiging.</p>
                <p></p>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Uur</th>
                        <th>Vrije plaatsen</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>woensdag 25 jan</td>
                        <td>14.00 uur</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                     aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                    >5 plaatsen
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>woensdag 25 jan</td>
                        <td>18.00 uur</td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70"
                                     aria-valuemin="0" aria-valuemax="100" style="width:100%">
                                    Uitverkocht
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>zondag 7 feb</td>
                        <td>14.00 uur</td>
                        <td>5 plaatsen</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
