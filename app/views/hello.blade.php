@if (auth::check())
@extends ('admin.base')
@section ('content')
<div class='jumbotron'>
    <div class='container'>
        <strong>Bienvenido al panel de administración {{ auth::user()->username }}.</strong> Aquí es donde podrá administrar todo lo referente a productos, categorias, etc. de plantas horticolas y semillas
    </div>
    </div>
@stop
@endif