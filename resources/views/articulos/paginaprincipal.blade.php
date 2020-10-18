<link rel="stylesheet" href="css/paginaprincipal.css"/>

@extends('layouts.app')

@section('content')


<div class="container">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <form action="">
        <div class="title" style="margin-left: 12%">
            <h1>Blog</h1>
        </div>        
        <div class="row row-cols-1 row-cols-md-2" id="">
            @for($i = 0; $i < count($articulos); $i++)
                <div class="col mb-2">
                    <div class="card" id="cardBlog">
                        <img src="{{asset('storage').'/'.$articulos[$i]->foto}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{$articulos[$i]->nombre}}</h4>
                            <p class="card-title">Fecha de publicación: {{date('Y-m-d', strtotime($articulos[$i]->created_at))}}  </p>
                            <p class="card-title">
                                @for($o = 0; $o < count($categorias); $o++)
                                    @if($categorias[$o]->IDcategoria==$articulos[$i]->IDcategoria)
                                    
                                      Categoria - {{$categorias[$o]->nombre}}      
                
                                    @endif
                                @endfor 
                            </p>
                            
                            <p class="card-text " id="pContenido" >{{$articulos[$i]->contenido}}</p>
                            <a href="{{url('/contenidoArticulo/'.$articulos[$i]->id)}}" class="btn btn-outline-primary btn-block">Ver mas</a>
                        </div>
                    </div>
                </div>
            @endfor 
          </div>
          
    </form>
    {{ $articulos->links('pagination::bootstrap-4') }}      
</div>

@endsection