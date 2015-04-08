@extends ('admin.base')
@section('title')
<title>Login</title>
@stop
@section('links')
    @parent
    {{ HTML::style('asset/css/login.css') }}
@stop
@section('content1')
<div class="span4 offset4">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-lock"> <span class="title-login">Login</span> </i>
                </div>
            </div>
            <div class="panel panel-body">
                <!-- Preguntamos si hay un mensaje de error y si hay lo mostramos -->
                @if (Session::has('error')) 
                <div class='alert alert-danger'>{{ Session::get('error') }}</div>
                @endif
                {{ Form::open(array('url' => 'login', 'role' => 'form')) }}
                    <div class="form-group">
                        {{ Form::label('inputusername', 'Username', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::text('inputusername','', array('placeholder' => 'Introduce el nombre del usuario', 'class' => 'form-control', 'autofocus' => 'true')) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('inputpassword', 'password', array('class' => 'col-sm-3 control-label')) }}
                        <div class="col-sm-9">
                            {{ Form::password('inputpassword', array('placeholder' => 'Introduce la contraseña', 'class' => 'form-control'))}}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('rememberme', true) }}
                                    Recordar contraseña
                                </label>
                            </div>
                        </div>
                    </div>
                <div class="form-group last">
                    <div class="col-sm-offset-3 col-sm-9">
                     
                        {{ Form::submit('Sign in', array('class' => 'btn btn-success btn-sm')) }}
                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                    </div>
                </div>
                {{ Form::close() }}
            </div>
        </div> 
    </div>
</div>    
@stop
