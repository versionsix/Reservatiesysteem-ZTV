@extends('base')

@section('title', 'Beheer')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Beheerconsole</h4></div>
            <div class="panel-body">
                Dit is de beheerconsole, selecteer in het menu hierboven wat je wil aanpassen.
            </div>
            <!--/panel-body-->
        </div>
        <!--/panel-->
    </div>
    @include('backend.bottom')
@endsection