@extends('admin/base')
@section ('content')
<div class='panel panel-default'>
    <div class='panel-heading'>
        <h3 class='panel-title'><i class='fa fa-user'></i> Gestión de usuarios</h3>
    </div>
</div>
<div class='panel-body'>
    <form role='form' class='form-horizontal' method='post'>
        @if(Auth::check() && Auth::user()->admin) 
        <a id="link-modal" class='btn btn-primary pull-right' data-toggle='modal' data-target="#box-modal"><i class='fa fa-plus'></i> Alta usuario</a>
        @endif
        <h2>Listado de usuarios</h2>
        @if($users && !$users->isEmpty())
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>Seleccionar</th>
                    <th>#</th>
                    <th>Nombre de usuario</th>
                    <th>Email</th>
                    <th>Administrador</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class='text-center'><input type='checkbox' name='rusuario[]' value='{{ $user->id }}' id='{{ $user->id }}' /></td>
                    <td class='text-center'>{{ $user->id }}</td>
                    <td class='text-center'>{{ $user->email }} </td>
                    <td class='text-center'>@if ($user->admin == 1) SI @else NO @endif</td>
                    @if(Auth::check() && Auth::user()->admin)
                    <td><a href="#" class="btn btn-primary" role="button"><i class="fa fa-pencil fa-fw"></i>Modificar</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
            <tfooter>
                @if(Auth::check() && Auth::user()->admin)
                <tr>
                    <td><button type="submit" class="btn btn-danger text-center" name="eliminar"><i class="fa fa-trash-o fa-fw"></i>Eliminar</button></td>
                </tr>
                @endif
            </tfooter>
        </table>
        @else
        <div class="alert alert-info">
            No hay usuarios para mostrar
        </div>
        @endif
    </form>
</div>
@stop
@if(Auth::check() && Auth::user()->admin)
@section('modal_body')
    {{ Form::open(array('id' =>'formuser-create', 'url' => 'users/create', 'role' => 'form', 'class' => 'form-horizontal')) }}
        <fieldset>
            <legend>Alta nuevo usuario</legend>
            <div class="form-group">
                {{ Form::label('inputuser', 'Nombre de usuario', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-5">
                    {{ Form::text('inputuser','', array('placeholder' => 'Introduce la contraseña...', 'class' => 'form-control input-md')) }}   
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('inputpassword', 'Contraseña', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-5">
                    {{ Form::password('inputpassword','', array('placeholder' => 'Introduce la contraseña...', 'class' => 'form-control input-md')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('inputpassword1', 'Confirmar constraseña', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-5">
                    {{ Form::password('inputpassword1','', array('placeholder' => 'Vuelve a introducir la contraseña...', 'class' => 'form-control input-md')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('inputemail', 'Email', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-5">
                    {{ Form::text('inputemail','', array('placeholder' => 'Introduce el email...', 'class' => 'form-control input-md')) }} 
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('es_admin', '¿Es administrador?', array('class' => 'col-md-4 control-label')) }}
                <div class="col-md-5">
                    {{ Form::checkbox('es_admin',1,false) }}
                </div>
            </div>
        </fieldset>
    {{ Form::close() }}  
@stop
@section('modal_footer')
<div class='form-group text-center' id='editor-actions'>
    {{ Form::submit('Alta usuario', ['class' => 'btn btn-success', 'id' => 'submit']) }} 
    {{ Form::reset('Limpiar', ['class' => 'btn btn-primary']) }}
</div>
@stop
@endif


