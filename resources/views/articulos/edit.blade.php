
@extends('layouts.app')

@section('content')
<div class="container">
    <head>
        <title>Editar Artículo </title>
      </head>
    <div class="page-header">
        <h1>Editar Artículo</h1>
    </div>
    <br>
<form action="{{url('/articulos/'.$articulos->id)}}" class="form-horizontal" method="post" enctype="multipart/form-data">

    {{csrf_field()}}
    {{method_field('PATCH')}}

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>     
    @endif

    <div class="form-group">
        <label class="control-label" for="Nombre">{{'Nombre del Artículo'}}</label>
        <input class="form-control" type="text" name="nombre" id='nombre' value="{{$articulos->nombre}}">
    </div>
        <br>
    <div class="form-group">   
        <label class="control-label" for="contenido">{{'Contenido'}}</label>
        <textarea class="form-control" rows='5' name="contenido" id='contenido' value="">{{$articulos->contenido}}</textarea>
    </div>
    <br>
    <div class="form-group">   
        <label class="control-label" for="estatus">{{'Estatus'}}</label>
              
        <select class="form-control" name="estatus" id='estatus'value="">
            @if($articulos->estatus == 'A'){
                <option value="A" selected>A</option>
                <option value="I">I</option>
            }@else{
                <option value="I" selected >I</option>
                <option value="A">A</option>
            }
                
            @endif
            
            
        </select>
    </div>
    <br>
    <div class="form-group">
        <label class="control-label" for="estatus">{{'Foto'}}</label>
        <br>
        <img src="{{asset('storage').'/'.$articulos->foto}}" alt="" width="200">
        <br>
        <br>
        <input class="" type="file" name="foto" id="foto" value="">
        
    </div>
    <br>
    <div class="form-group">
        <label class="control-label" for="Categoria">{{'Categoria'}}</label>
        <select class="form-control" required name="IDcategoria" id="IDcategoria">
            <option value="">Seleccionar</option>
            @for($i = 0; $i < count($categorias); $i++)
                @if($articulos->IDcategoria==$categorias[$i]->IDcategoria)
                    <option selected value='{{$categorias[$i]->IDcategoria}}'>{{$categorias[$i]->nombre}}</option>
                @else
                    <option value='{{$categorias[$i]->IDcategoria}}'>{{$categorias[$i]->nombre}}</option>
                @endif
                
            
                
            @endfor
            
        </select>
    </div>
    <br> 
    <div class="form-group">
        <label class="control-label" for="created_at">{{'Fecha De Publicación'}}</label>
        <input class="form-control"  type="date" name="created_at" id="created_at"  value="{{date('Y-m-d', strtotime($articulos->created_at))}}">
    </div>
    <br> 
    <div class="form-group"> 
    <input type="submit" class="btn btn-secondary" value="Editar">
    <a href="{{url('articulos')}}" class="btn btn-primary">Regresar</a>
    </div>
</form>
</div>
@endsection