<div class="container backend">
    <div class="row">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ action("BackendController@ShowBeheer") }}">Beheer</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="{{ action("BackendController@ShowPlay") }}"><i class="glyphicon glyphicon-home"></i> Toneelstuk</a></li>
                    <li><a href="{{ action("BackendController@ShowPerformance") }}"><i class="glyphicon glyphicon-time"></i> Voorstelling</a></li>
                    <li><a href="{{ action("BackendController@ShowReservation") }}"><i class="glyphicon glyphicon-user"></i> Reservatie</a></li>
                    <li><a href="{{ action("BackendController@ShowPage") }}"><i class="glyphicon glyphicon-header"></i> Pagina</a></li>
                    <li><a href="{{ action("BackendController@ShowLog") }}"><i class="glyphicon glyphicon-align-justify"></i> Logs</a></li>
                </ul>
            </div>
        </nav>
    </div>
