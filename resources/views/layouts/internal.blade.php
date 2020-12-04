<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icono en pestaña n -->
    <link rel="shortcut icon" href="{{ asset('images/logol.png') }}" />

    <title>{{ config('app.name', 'Laravel') }}</title><!-- {{ config('app.name', 'Laravel') }} -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">

    <!-- ICONOS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.min.css" rel="stylesheet">

    
    <script src="http://code.jquery.com/jquery.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm"  style="background-image: url('{{ asset('images/fondoMdd.jpg')}}'); background-size: cover;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logol.png')}}" alt="logotipa MATERIAL GIRL" style="width: 120px; height: 120px; border-radius: 50%; margin: -10px;">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}"  style="color:#333; font:900 14px arial;">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('productos.index')  }}">Productos</a>
                            </li>
                        @else
                        @if( \Auth::user()->roles_id== 1 )
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('users.index') }}"  style="color:#333; font:900 14px arial;">Usuarios</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('roles.index') }}"  style="color:#333; font:900 14px arial;">Roles</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('cproducto.index')  }}" style="color:#333; font:900 14px arial;">Categoria Producto</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('productos.index')  }}" style="color:#333; font:900 14px arial;">Productos</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('talla.index')  }}" style="color:#333; font:900 14px arial;">Tallas</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('proveedores.index')  }}" style="color:#333; font:900 14px arial;">Proveedores</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{  route('detalle_compra.index') }}" style="color:#333; font:900 14px arial;">Pedidos</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{  route('compra.create') }}" style="color:#333; font:900 14px arial;">Compras</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{  route('ventas.index') }}" style="color:#333; font:900 14px arial;">Ventas</a>
                            </li>
                        @else
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('misDatos', \Auth::user()->id)}}" style="color:#333; font:900 14px arial;">Mis datos</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('misCompras')}}" style="color:#333; font:900 14px arial;">Mis compras</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{route('cataPro.index')}}" style="color:#333; font:900 14px arial;">Catalogo</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{  route('cart-show') }}" style="color:#333; font:900 14px arial; background: #fff; padding: 10px; border-radius: 4px;"><span class="oi oi-cart" id="divNotificaciones"></span></a>
                            </li>
                        @endif 
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle"  href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:#333; font:900 14px arial;" v-pre><span class="oi oi-person"></span>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:#333; font:900 14px arial;">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-4">
            @yield('content')
        <script> 
            var urlNotificaciones = "{{route('notificaciones')}}"; 
        </script> 
        {{HTML::script('js/carrito.js')}} 
        </main>
    </div>

        
</body>
</html>
