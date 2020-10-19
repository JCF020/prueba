<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $datos['categorias']= Categorias::paginate(8);

        return view('categorias.index',$datos);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.crear');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = request()->all();
        $categoria =request()->except('_token');

        $validacion=[
            'nombre'=>'required|String|max:100',
            'descripcion'=>'required|String',
            'estatus'=>'required|String|max:2',
        ];
        
        $mesaje =["required"=>'El :attribute es requerido'];

        $this->validate($request,$validacion,$mesaje);

        Categorias::insert($categoria);

        
        return redirect('categorias')->with('Mensaje','Categoria guardada');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($IDcategoria)
    {   
        $categoria = Categorias::findOrFail($IDcategoria);
        return view('categorias.editar',compact('categoria'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $IDcategoria)
    {
        $Infocategoria = request()->except(['_token','_method']);

        $validacion=[
            'nombre'=>'required|String|max:100',
            'descripcion'=>'required|String',
            'estatus'=>'required|String|max:2',
        ];
        
        $mesaje =["required"=>'El :attribute es requerido'];

        $this->validate($request,$validacion,$mesaje);

        Categorias::where('IDcategoria','=',$IDcategoria)->update($Infocategoria);
       
        return redirect('categorias')->with('Mensaje','Categoria editada');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($IDcategoria)
    {
        Categorias::destroy($IDcategoria);

        return redirect('categorias')->with('Mensaje','Categoria eliminada');
        //
    }
}
