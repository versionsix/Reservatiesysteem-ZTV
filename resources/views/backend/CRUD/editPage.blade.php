@extends('base')

@section('title', 'Toneelstukken - Toneelstuk toevoegen')

@section('content')
    <!-- Main -->
    @include('backend.top')
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4>Pagina "{{$page->name}}" bewerken</h4>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ action("BackendController@ShowPageEdit", $page->id) }}">
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
                    <div class="form-group{{ $errors->has('page_content') ? ' has-error' : '' }}">
                        <label for="eventName" class="col-md-4 control-label">Pagina content: </label>
                        <div class="col-md-6">

                            Deze info komt op de aanegegeven pagina te staan


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
                            <textarea name="page_content" id="summernote">{{ old('page_content') != null ? old('page_content') : $page->content}}</textarea>
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