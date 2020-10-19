
@extends('layouts.app')

@section('content')
<div class="container">

    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>     
    @endif
    <head>
        <title>Agregar Artículo </title>
      </head>
    
<form action="{{url('/articulos')}}" class="form-horizontal" method='post' enctype="multipart/form-data" >
    {{csrf_field()}}

    <div class="page-header">
        <h1>Agregar Artículo</h1>
    </div>
        <br>
    <div class="form-group">
        <label class="control-label"  for="Nombre" >{{'Nombre Del Articulos'}}</label>
        <input class="form-control"  type="text" name="nombre" id='nombre' value="">
    </div>
        <br>
    <div class="form-group">       
        <label class="control-label" for="contenido">{{'Contenido'}}</label>
        <textarea class="form-control" id="contenido" name="contenido" rows="8" value=""></textarea>
    </div>    
    <br>
    
        <div class="form-group">
            <label class="control-label" for="estatus">{{'Estatus'}}</label>
            <select class="form-control" name="estatus" id='estatus'value="">
                <option value="">Selecciona</option>
                <option value="A">A</option>
                <option value="I">I</option>
            </select>
         </div>
    <br> 
    <div class="form-group">
        <label class="control-label" for="estatus">{{'Foto'}}</label>
        <input class="" type="file" name="foto" id="foto">
    </div>
    <br>
    <div class="form-group">
        <label class="control-label" for="Categoria">{{'Categoria'}}</label>
        <select class="form-control" required name="IDcategoria" id="IDcategoria">
            <option value="">Seleccionar</option>
            @for($i = 0; $i < count($categorias); $i++)
                <option value='{{$categorias[$i]->IDcategoria}}'>{{$categorias[$i]->nombre}}</option>
            
                
            @endfor
            
        </select>
    </div>
    <br> 
    <div class="form-group">
        <label class="control-label" for="created_at">{{'Fecha De Publicación'}}</label>
        <input class="form-control" type="date" name="created_at" required id="created_at">
            
    </div>
    <br> 
    <div class="form-group">
    <input type="submit" class="btn btn-primary"  value="Guardar">
        <a class="btn btn-secondary" href="{{url('articulos')}}">Regresar</a>
    </div>
</form> 
</div>

@endsection