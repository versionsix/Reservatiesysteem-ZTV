@extends('base')

@section('title', 'Beheer')

@section('content')
    <!-- Main -->
    <div class="container backend">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#">Beheer</a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="glyphicon glyphicon-home"></i> Toneelstuk</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-time"></i> Voorstelling</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-user"></i> Reservatie</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-header"></i> Pagina</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-align-justify"></i> Logs</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Beheerconsole</h4></div>
                <div class="panel-body">
                    Dit is de beheerconsole
                </div>
                <!--/panel-body-->
            </div>
            <!--/panel-->
        </div>

@endsection