@extends('base')

@section('title', 'Toneelstukken - Lijst')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Email logs</h4>

            </div>
            <div class="panel-body">
                Op deze pagina kan je de verzonden e-mails weergeven.
                <br/>
                @if (count($log) == 0)
                    Sorry, geen gevonden. Voeg er een toe met de knop voeg toe.
                @endif

                <br/>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Email</th>
                        <th>Datum</th>
                        <th>Actie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($log as $log_item)
                        <tr>
                            <td>{{ $log_item->name_to }}</td>
                            <td>{{ $log_item->email_to}}</td>
                            <td>{{ $log_item->created_at}}</td>
                            <td class="action"><a href="{{action('BackendController@ShowLogItem', $log_item->id)}}"
                                                  class="btn btn-xs btn-primary"><span
                                            class="glyphicon glyphicon-new-window"></span> Geef weer</a></td>
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