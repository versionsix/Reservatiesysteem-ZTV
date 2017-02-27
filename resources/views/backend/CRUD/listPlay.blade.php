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
                Op deze pagina kan je de het toneelstuk aanpassen. Je kan zoveel toneelstukken toevoegen als je wil, je
                kan echter altijd maar één toneelstuk als ingeschakeld instellen.
                <br/>
                @if (count($play) == 0)
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
                        <th>Toneelstuk</th>
                        <th>Ingeschakeld</th>
                        <th colspan="2">Actie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($play as $play_item)
                        <tr>
                            <td>{{ $play_item->name }}</td>
                            <td>{{ $play_item->enabled == 'true' ? "Ja" : "Nee"}}</td>
                            <td class="action"><a href="{{action('BackendController@ShowPlayEdit', $play_item->id)}}"
                                                  class="btn btn-xs btn-primary"><span
                                            class="glyphicon glyphicon-edit"></span> Bewerk</a></td>
                            <td class="action"><a href="{{action('BackendController@ShowPlayDelete', $play_item->id)}}"
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