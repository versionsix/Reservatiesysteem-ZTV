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
                <pre>{{json_encode(json_decode($log->email_content), JSON_PRETTY_PRINT)}}
                </pre>

            </div>
            <!--/panel-body-->
        </div>
        <!--/panel-->
    </div>
    @include('backend.bottom')
@endsection