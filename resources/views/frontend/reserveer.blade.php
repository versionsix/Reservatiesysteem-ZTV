@extends('base')

@section('title', 'Contactpagina')

@section('content')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Contactgegevens reservatie: {{$performance->play->name}}, {{$performance->date}} {{$performance->hour}}</h4></div>
            <div class="panel-body">
                <p>
                    Je hebt {{count($seats_selected_ids)}} zitjes aangeduid. Geef je contactgegevens in om verder te gaan met de reservatie.</p>

                {{ Form::open() }}

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/voorstelling/' . $id . '/reserveer') }}">
                    <input type="hidden" id="client_info" name="client_info" value="true">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('eventName') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Event Name</label>

                        <div class="col-md-6">
                            <input id="eventName" type="text" class="form-control" name="eventName" value="{{ old('eventName') }}"
                                   required autofocus>

                            @if ($errors->has('eventName'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('eventName') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('eventCodes') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Opmerkingen</label>

                        <div class="col-md-6">
                    <textarea rows="10" id="eventCodes" type="password" class="form-control" name="eventCodes"
                              required>{{ old('eventCodes') }}</textarea>

                            @if ($errors->has('eventCodes'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('eventCodes') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Add Event
                            </button>
                        </div>
                    </div>
                </form>




            </div>
            <!--/panel-body-->
        </div>


        <br>
        <hr>

        <pre>{{ json_encode($seats_selected_ids, JSON_PRETTY_PRINT) }}</pre>
    </div>
@endsection