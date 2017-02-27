@extends('base')

@section('title', 'Toneelstukken - Lijst')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Pagina's</h4>

            </div>
            <div class="panel-body">
                Op deze pagina kan je de pagina's aanpassen.
                <br/>
                @if (count($page) == 0)
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
                        <th>Pagina</th>
                        <th>Actie</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($page as $page_item)
                        <tr>
                            <td>{{ $page_item->name }}</td>
                            <td class="action"><a href="{{action('BackendController@ShowPageEdit', $page_item->id)}}"
                                                  class="btn btn-xs btn-primary"><span
                                            class="glyphicon glyphicon-edit"></span> Bewerk</a></td>
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