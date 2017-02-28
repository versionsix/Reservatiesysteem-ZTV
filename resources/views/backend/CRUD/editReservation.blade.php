@extends('base')

@section('title', 'Toneelstukken - Toneelstuk toevoegen')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Toneelstuk "{{$play->name}}" bewerken</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ action("BackendController@ShowPlayEdit", $play->id) }}">
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
                <!-- name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Naam toneelstuk: </label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                   value="{{ $play->name }}"
                                   autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('playEnabled') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Ingeschakeld: </label>

                        <div class="col-md-6">
                            <div class="checkbox">
                                <input id="playEnabled" name="playEnabled" type="checkbox" value="true"
                                       @if ($play->enabled == "true") checked @endif>
                            </div>

                            @if ($errors->has('playEnabled'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('playEnabled') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('page_content') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Toneelstuk Beschrijving: </label>
                        <div class="col-md-6">

                            Deze info komt op de voorpagina te staan


                            @if ($errors->has('page_content'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('page_content') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <div class="row justify-content-md-center">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <textarea name="page_content" id="summernote">{{$play->page_content}}</textarea>
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