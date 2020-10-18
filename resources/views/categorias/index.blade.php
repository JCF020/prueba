

@extends('layouts.app')

@section('content')

<div class="container">
    @if(Session::has('Mensaje')){{
        Session::get('Mensaje')
    }}
    @endif

<script>
    function confirmarEliminar(){
        return confirm('Desea Eliminar este registro');
    }
</script>


<div class="page-header">
    <h1>Categorías</h1>
</div>

 
<table class="table  table-hover table-bordered" >
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre de la categoria</th>
            <th scope="col">Descripcion de la categoria</th>
            <th scope="col">Estatus</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 0; $i < count($categorias); $i++)
        <tr>
            <td scope="row">{{$contador = $i + 1}}</td>
            <td scope="">{{$categorias[$i]->nombre}}</td>
            <td scope="">{{$categorias[$i]->descripcion}}</td>
            <td scope="">{{$categorias[$i]->estatus}}</td>
            <td scope="">
                <a class="btn btn-primary " href="{{url('/categorias/'.$categorias[$i]->IDcategoria.'/edit')}}">
                    Editar
                </a>
            </td>
        </tr>
        @endfor
    </tbody>
</table>
{{ $categorias->links('pagination::bootstrap-4') }} 
</div>
@endsection
