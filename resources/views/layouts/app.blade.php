<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse">
            <a href="/" class="navbar-brand">
                <img src="<?php echo asset('img/blog.jpg')?>" alt="" class="d-inline-block aling-top" height="50" width="50"> 
                Blog
                
            </a>
                 
            
                <div class="navbar-nav">
                    <a href="{{url('/')}}" class="nav-item nav-link @yield('menu_index')">Inicio</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Artículos</a>
                        <div class="dropdown-menu  bg-dark">
                          <a class="dropdown-item text-white bg-dark"  href="{{url('articulos/create')}}">Agregar altículos</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-white bg-dark" href="{{url('articulos')}}">Administrar altículos</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categorías</a>
                        <div class="dropdown-menu  bg-dark">
                          <a class="dropdown-item text-white bg-dark"  href="{{url('categorias/create')}}">Agregar Categoría</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item text-white bg-dark" href="{{url('categorias')}}">Administrar Categorías</a>
                        </div>
                    </li>
                    
                    <a href="{{url('/api')}}" class="nav-item nav-link">Api Noticias</a>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
