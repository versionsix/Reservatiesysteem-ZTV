@extends('base')

@section('title', 'Homepage')

@section('content')

<div class="row">
    <div class="col-lg-12 text-center">
        <h1>Zammelse Toneel Vrienden </h1>
        <p class="lead">Welkom op de pagina van de toneelreservaties. Hieronder is een overzicht van de data. Selecteer je datum en vervolgens kan je je zitplaats selecteren.</p>
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
                <td>14.00 uur </td>
                <td>5 plaatsen</td>
            </tr>
            <tr>
                <td>woensdag 25 jan</td>
                <td>18.00 uur </td>
                <td>50 plaatsen</td>
            </tr>
            <tr>
                <td>zondag 7 feb</td>
                <td>14.00 uur </td>
                <td>5 plaatsen</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- /.row -->
@endsection
