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
                <!--
                Haal alle evenementen op uit de database.
                -->


                <table class="table">
                    <thead>
                    <tr>
                        <th>Datum + uur</th>
                        <th>Vrije plaatsen</th>
                    </tr>
                    </thead>
                <tbody>
                @foreach ($voorstellingen as $voorstelling)
                <tr>
                    <td>
                        <a href="/voorstelling/{{ $voorstelling->id }}">
                        {{ $voorstelling->datum }} {{ $voorstelling->uur }}
                        </a>
                    </td>
                    <td>
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40"
                                 aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                >5 plaatsen
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection
