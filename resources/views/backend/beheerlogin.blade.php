@extends('base')

@section('title', 'Beheer')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-offset-3 col-md-7">
                <div class="form-login">
                    <h4>Backend login</h4>
                    <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="Gebruikersnaam" />
                    </br>
                    <input type="text" id="userPassword" class="form-control input-sm chat-input" placeholder="Wachtwoord" />
                    </br>
                    <div class="wrapper">
            <span class="group-btn">
                <a href="#" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></a>
            </span>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection