@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="css/paginaprincipal.css"/>
<div class="container">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <form action="">
        <div class="title" style="">
            <h1>Noticias Internacionales</h1>
        </div>
        
        <div class="row row-cols-1 row-cols-md-2" id="">
            
            @for($i = 0; $i < count($noticias->articles); $i++)
            <div class="col mb-2">
                <div class="card" id="cardBlog">
                    <img src="{{$noticias->articles[$i]->urlToImage}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title">{{$noticias->articles[$i]->title }}</h4>
                        <p class="card-title">Fecha de publicación: {{date('Y-m-d', strtotime($noticias->articles[$i]->publishedAt))}}  </p>
                        <p class="card-title" id="Pautor">Autor - {{$noticias->articles[$i]->author}}</p>
                        
                        <p class="card-text " id="pContenido" >{{$noticias->articles[$i]->title}}</p>
                        <a href="{{url($noticias->articles[$i]->url)}}" class="btn btn-outline-primary btn-block">Ver mas</a>
                    </div>
                </div>
            </div>       

                        
                           
                   
            
            @endfor
            
        </div>
          
    </form>
             
</div>

@endsection