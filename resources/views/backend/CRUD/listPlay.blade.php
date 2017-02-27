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
                @if (count($play) == 0)
                Sorry, geen gevonden. Voeg er een toe met de knop voeg toe.
                @endif
                @if (count($request->old()) > 0)
                    <div class="alert alert-success">
                        <ul>
                            Toneelstuk {{$request->old('name')}} successvol toegevoegd!
                        </ul>
                    </div>
                @endif
                <br />
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Toneelstuk</th>
                        <th>Enabled</th>
                        <th  colspan="2">Actie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($play as $play_item)
                        <tr>
                            <td>{{ $play_item->name }}</td>
                            <td>{{ $play_item->enabled == 'true' ? "Ja" : "Nee"}}</td>
                            <td class="action"><a href="#" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span> Bewerk</a></td>
                            <td class="action"><a href="#" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove"></span> Verwijder</a></td>
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