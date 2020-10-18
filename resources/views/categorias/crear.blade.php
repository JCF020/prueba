
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>Agregar Categoría</h1>
    </div>
    <br>
    @if(count($errors)>0)
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>     
    @endif
<form action="{{url('/categorias')}}" class="form-horizontal" method='post' enctype="multipart/form-data" >
    {{csrf_field()}}
    
    <div class="form-group">
        <label class="control-label"  for="Nombre" >{{'Nombre De la Categoria'}}</label>
        <input class="form-control"  type="text" name="nombre" id='nombre' value="">
    </div>
        <br>
    <div class="form-group">       
        <label class="control-label" for="descripcion">{{'Descripción'}}</label>
        <input class="form-control" type="text" name="descripcion" id='descripcion' value="">
    </div>    
    <br>
    
        <div class="form-group">
            <label class="control-label" for="estatus">{{'Estatus'}}</label>
            <select class="form-control" name="estatus" id='estatus'value="">
                <option value="">Seleccionar</option>
                <option value="A">A</option>
                <option value="I">I</option>
            </select>
         </div>
    <br>       
    <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Guardar">
        <a class="btn btn-secondary" href="{{url('categorias')}}">Regresar</a>
    </div>
</form> 
</div>

@endsection