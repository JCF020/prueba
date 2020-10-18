@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="<?php echo asset('css/paginasecundaria.css')?>" type="text/css"> 
    
    
    <div class="container">
        <link rel="stylesheet" href="{{ URL::asset('public/css/paginasecundaria.css') }}">
        
        <div class="card mb-3 " style="" id="cardPrincipal">
            <img id="imgCard" src="{{asset('storage').'/'.$articulos->foto}}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$articulos->nombre}}</h5>
                <p class="card-text">
                  Categoria: {{$categorias->nombre}}      
                </p>
                
              <p class="card-text text-justify" id="pContenido">{{$articulos->contenido}}</p>
              <p class="card-text"><small class="text-muted">Fecha de publicación {{date('Y-m-d', strtotime($articulos->created_at))}}</small></p>
            </div>
          </div>
    </div>


@endsection