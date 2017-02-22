@extends('base')

@section('title', 'Contactpagina')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Contactgegevens reservatie: {{$performance->play->name}}, {{$performance->date}} {{$performance->hour}}</h4></div>
            <div class="panel-body">
                <p>
                    Je hebt {{count( explode(',', $buttons_selected))}} zitjes aangeduid. Vul je contactgegevens in om verder te gaan met de reservatie. Je krijgt een bevestigingsmail.</p>


                <form class="form-horizontal" role="form" method="POST" action="{{ url('/voorstelling/' . $id . '/reserveer') }}">
                    <input type="hidden" id="client_info" name="client_info" value="true">
                    <input type="hidden" id="buttons_selected_ids" name="buttons_selected" value="{{$buttons_selected}}">
                    {{ csrf_field() }}
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- Voornaam -->
                    <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Voornaam: </label>

                        <div class="col-md-6">
                            <input id="firstName" type="text" class="form-control" name="firstName" value="{{ old('firstName') }}"
                                    autofocus>

                            @if ($errors->has('firstName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <!-- Achternaam -->
                    <div class="form-group{{ $errors->has('surName') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Achternaam: </label>

                        <div class="col-md-6">
                            <input id="surName" type="text" class="form-control" name="surName" value="{{ old('surName') }}"
                                    autofocus>

                            @if ($errors->has('surName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('surName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- Adres -->
                    <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Adres: </label>

                        <div class="col-md-6">
                            <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}"
                                    autofocus>

                            @if ($errors->has('address1'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- Postcode -->
                    <div class="form-group{{ $errors->has('zipCode') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Postcode: </label>

                        <div class="col-md-6">
                            <input id="zipCode" type="text" class="form-control" name="zipCode" value="{{ old('zipCode') }}"
                                    autofocus>

                            @if ($errors->has('zipCode'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('zipCode') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- Gemeente -->
                    <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Gemeente: </label>

                        <div class="col-md-6">
                            <input id="place" type="text" class="form-control" name="place" value="{{ old('place') }}"
                                    autofocus>

                            @if ($errors->has('place'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('place') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Email: </label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}"
                                    autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- TelefoonNummer -->
                    <div class="form-group{{ $errors->has('telephoneNumber') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Telefoonnummer: </label>

                        <div class="col-md-6">
                            <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber" value="{{ old('telephoneNumber') }}"
                                    autofocus>

                            @if ($errors->has('telephoneNumber'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('telephoneNumber') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <!-- Opmerkingen -->
                    <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Opmerkingen</label>

                        <div class="col-md-6">
                    <textarea rows="10" id="comment" class="form-control" name="comment"
                              >{{ old('comment') }}</textarea>

                            @if ($errors->has('comment'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>






                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary data-single-click">
                                RESERVEER!
                            </button>
                        </div>
                    </div>
                </form>




            </div>
            <!--/panel-body-->
        </div>


        <br>
        <hr>

    </div>
@endsection