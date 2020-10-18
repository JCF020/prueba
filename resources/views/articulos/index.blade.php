

@extends('layouts.app')

@section('content')



<div class="container" >
    <link rel="stylesheet" href="<?php echo asset('css/tablaarticulos.css')?>" type="text/css">

   
<script>
    function confirmarEliminar(){
        return confirm('Desea Eliminar este registro');
    }

    $('.two-line').ellipsis({ lines: 1 });
</script>

    <div class="page-header">
        <h1>Artículos</h1>
    </div>
    

<div class="table-responsive"> 
<table class="table  table-hover table-bordered table-sm" >
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Foto</th>
            <th scope="col">Nombre del Articulo</th>
            <th scope="col">Contenido</th>
            <th scope="col">Categoria</th>
            <th scope="col">Estatus</th>
            <th scope="col">Fecha De publicación</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        {{$categoriaNombre=''}}
        

        @for($i = 0; $i < count($articulos); $i++)
            
        <tr>
            <td scope="row">{{$contador = $i + 1}}</td>
            <td scope="">
                <img src="{{asset('storage').'/'.$articulos[$i]->foto}}" alt="" width="200">
                
            </td>
            <td scope="">{{$articulos[$i]->nombre}}</td>

            <td scope="" class="box box--fixed two-line">{{$articulos[$i]->contenido}}</td>
            
            @for($o = 0; $o < count($categorias); $o++)
                @if($categorias[$o]->IDcategoria==$articulos[$i]->IDcategoria)
                <td scope="">
                    {{$categorias[$o]->nombre}}      
                </td>
                @endif
            @endfor
            <td scope="">{{$articulos[$i]->estatus}}</td>
            <td scope="">{{date('Y-m-d', strtotime($articulos[$i]->created_at))}}</td> 
            <td scope="">
                <a class="btn btn-secondary " href="{{url('/articulos/'.$articulos[$i]->id.'/edit')}}">
                    Editar
                </a>
                

                <form method="post" action="{{url('/articulos/'.$articulos[$i]->id)}}" style="display: inline">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Seguro de eliminar esta categoria');">Eliminar</button>
                </form>
            </td>
        </tr>
        @endfor
    </tbody>
</table>
</div>
{{ $articulos->links('pagination::bootstrap-4') }}
</div>


@endsection
