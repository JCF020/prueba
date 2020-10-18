
@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('Mensaje')){{
    Session::get('Mensaje')
}}
@endif
<div class="page-header">
    <h1>Editar Categoría</h1>
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
<form action="{{url('/categorias/'.$categoria->IDcategoria)}}" class="form-horizontal" method="post" enctype="multipart/form-data">

    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-group">
        <label class="control-label" for="Nombre">{{'Nombre De la Categoria'}}</label>
        <input class="form-control" type="text" name="nombre" id='nombre' value="{{$categoria->nombre}}">
    </div>
        <br>
    <div class="form-group">   
        <label class="control-label" for="descripcion">{{'Descripcion De la Categoria'}}</label>
        <input class="form-control" type="text" name="descripcion" id='descripcion' value="{{$categoria->descripcion}}">
    </div>
    <br>
    <div class="form-group">   
        <label class="control-label" for="estatus">{{'Estatus De la Categoria'}}</label>
              
        <select class="form-control" name="estatus" id='estatus'value="">
            @if($categoria->estatus == 'A'){
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
    <input type="submit" class="btn btn-secondary" value="Editar">
    <a href="{{url('categorias')}}" class="btn btn-primary">Regresar</a>
    </div>
</form>
</div>
@endsection