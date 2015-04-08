<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Miguel Angulo Martínez">
        @section('title')
            <title>ViverSoft</title>
        @show
        @section('links')
        {{ HTML::style('asset/css/bootstrap.min.css') }}
        {{ HTML::style('asset/css/font-awesome.min.css') }}
        @show
    </head>
    <body>
        <header>
        <!-- Barra de navegacion -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex6-collapse">
                    <span class="sr-only">Desplegar navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">ViverSoft</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        <li><a href="{{ URL::to('logout') }}">Salir</a></li>
                    @else
                        <li><a href="{{ URL::to('login') }}">Entrar</a></li>
                    @endif
                </ul>
            </div>
        </nav>
        <!--Fin barra de navegación-->
        </header>
        <div class="container">
        @if (Auth::check())
            <section>
            <nav>
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('frontpage') }}">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
            </nav>
            </section>
            <section>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-xs-4">
                    <div class="dropdown menu col-lg-9 col-md-9 col-xs-9">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a tabindex="-1" href="">GESTION DE EMPLEADOS</a></li>
                        @if (Auth::check() && Auth::user()->admin)
                        <li><a tabindex="-1" href="{{ URL::to('users') }}">GESTION DE USUARIOS</a></li>
                        @endif
                        <li><a class="dropdown-toggle" data-toggle="dropdown">GESTION DE PEDIDOS</a>
                            <ul class="dropdown-menu">
                                <li><a tabindex="-1" href="">Realizar pedido</a></li>
                                <li><a href="">Listado de carritos</a></li>
                                <li><a href="">Listado de pedidos</a></li>
                            </ul>
                        </li>
                    </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-xs-8">
                @yield('content')
                </div> 
            </div>
            </section>
        @else
            <section>
                <div class="row">
                    @yield('content1')
                </div>
            </section>
        @endif 
        </div>
        <div class="modal fade" id="box-modal" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><!-- Aqui va el titulo de la pagina modal -->@yield('modal_title')</h4>
                    </div>
                    <div class="modal-body">
                        <div class="alert hidden" id="modal-alert"></div>
                        <!--Aqui va el cuerpo de la página modal -->
                        @yield('modal_body')
                   
                    </div>
                    <div class="modal-footer">
                    <!-- Aquí va el pie de la pagina modal -->
                    @yield('modal_footer')
                    </div>
                </div>
            </div>
        </div>
        {{ HTML::script('asset/jquery/jquery-1.11.1.min.js') }}
        {{ HTML::script('asset/js/boostrap.min.js') }}
        <!--
        <script src="/js/main.js"></script>
        -->
    </body>
</html>