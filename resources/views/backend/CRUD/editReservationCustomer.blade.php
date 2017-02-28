@extends('base')

@section('title', 'Toneelstukken - Toneelstuk toevoegen')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Reservatie van "{{$reservationCustomer->firstName}} {{$reservationCustomer->surName}}" bewerken</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ action("BackendController@ShowReservationEdit", $reservationCustomer->id) }}">
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
                            <input id="firstName" type="text" class="form-control" name="firstName"
                                   value="{{ old('firstName') != null ? old('firstName') : $reservationCustomer->firstName}}"
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
                            <input id="surName" type="text" class="form-control" name="surName"
                                   value="{{ old('surName') != null ? old('surName') : $reservationCustomer->surName}}"
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
                        <label for="address1" class="col-md-4 control-label">Adres: </label>

                        <div class="col-md-6">
                            <input id="address1" type="text" class="form-control" name="address1"
                                   value="{{ old('address1') != null ? old('address1') : $reservationCustomer->address1}}"
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
                            <input id="zipCode" type="text" class="form-control" name="zipCode"
                                   value="{{ old('zipCode') != null ? old('zipCode') : $reservationCustomer->zipCode}}"
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
                        <label for="place" class="col-md-4 control-label">Gemeente: </label>

                        <div class="col-md-6">
                            <input id="place" type="text" class="form-control" name="place"
                                   value="{{ old('place') != null ? old('place') : $reservationCustomer->place}}"
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
                        <label for="email" class="col-md-4 control-label">Email: </label>

                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email"
                                   value="{{ old('email') != null ? old('email') : $reservationCustomer->email}}"
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
                        <label for="telephoneNumber" class="col-md-4 control-label">Telefoonnummer: </label>

                        <div class="col-md-6">
                            <input id="telephoneNumber" type="text" class="form-control" name="telephoneNumber"
                                   value="{{ old('telephoneNumber') != null ? old('telephoneNumber') : $reservationCustomer->telephoneNumber}}"
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
                        <label for="comment" class="col-md-4 control-label">Opmerkingen</label>

                        <div class="col-md-6">
                    <textarea rows="10" id="comment" class="form-control" name="comment"
                    >{{ old('comment') != null ? old('comment') : $reservationCustomer->comment}}</textarea>

                            @if ($errors->has('comment'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary"
                                    onclick="this.disabled=true;this.value='Verzenden, even geduld...';this.form.submit();">
                                Bewerk
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!--/panel-body-->
        </div>
        <!--/panel-->
    </div>
    @include('backend.bottom')
@endsection