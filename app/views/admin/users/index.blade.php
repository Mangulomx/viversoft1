@extends('admin/base')
@section ('content')
<div class='panel panel-default'>
    <div class='panel-heading'>
        <h3 class='panel-title'><i class='fa fa-user'></i>Gestión de usuarios</h3>
    </div>
</div>
<div class='panel-body'>
    <form role='form' class='form-horizontal' method='post'>
        @if(Auth::check() && Auth::user()->admin) 
        <a href='' class='btn btn-primary pull-right'><i class='fa fa-plus'></i>Alta usuario</a>
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
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong>Error</strong> No hay usuarios para mostrar
        </div>
        @endif
    </form>
</div>
@stop


