<?php

namespace App\Http\Controllers;

use App\Models\Articulos;
use App\Models\Categorias;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['articulos'] = Articulos::orderByRaw('created_at DESC')->paginate(5);
        $datos['categorias'] = Categorias::all();
        
        return view('articulos.index',$datos); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //$categorias = Categorias::all();
        $categorias = Categorias::where('estatus','=','A')->get();;
       // dd($categorias);exit;
        return view('articulos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validacion=[
            'nombre'=>'required|String|max:100',
            'contenido'=>'required|String',
            'estatus'=>'required|String|max:2',
            'foto'=>'required|max:1000|mimes:jpeg,png,jpg',
            ];
        
        $mesaje =["required"=>'El :attribute es requerido'];

        $this->validate($request,$validacion,$mesaje);

        $articulos = request()->all();
        
        $articulos =request()->except('_token');
        
        if($request->hasFile('foto')){
            $articulos['foto']=$request->file('foto')->store('uploads','public');
        }

        Articulos::insert($articulos);

        return redirect('articulos')->with('Mensaje','Artículo creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function show(Articulos $articulos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articulos = Articulos::findOrFail($id);
        //dd($articulos);exit;
        $categorias = Categorias::all();
        return view('articulos.edit',compact('articulos','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validacion=[
            'nombre'=>'required|String|max:100',
            'contenido'=>'required|String',
            'estatus'=>'required|String|max:2',
        ];

        if($request->hasFile('foto')){
            $validacion+=['foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $mesaje =["required"=>'El :attribute es requerido'];

        $this->validate($request,$validacion,$mesaje);

        $InfoArticulos = request()->except(['_token','_method']);
        
        if($request->hasFile('foto')){
            $articulos=Articulos::findOrFail($id);
            
            Storage::delete('public/'.$articulos->foto);
            
            $InfoArticulos['foto']=$request->file('foto')->store('uploads','public');
        }

        Articulos::where('id','=',$id)->update($InfoArticulos);
        
        return redirect('articulos')->with('Mensaje','Articulos editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Articulos::destroy($id);

        return redirect('articulos')->with('Mensaje','Articulo eliminado');
    }

    public function paginaPrincipal(){
        
        $fechaActual = new DateTime();
        
        $datos['articulos'] = Articulos::where('created_at','<=',$fechaActual,'and',)->orderByRaw('created_at DESC')->paginate(6);
        
        $datos['categorias'] = Categorias::all();
        
        return view('articulos.paginaprincipal',$datos);     
    }

    public function contenidoArticulo($id){

        $datos['articulos'] = Articulos::findOrFail($id);
        $datos['categorias'] = Categorias::findOrFail($datos['articulos']->IDcategoria);

        return view('articulos.contenidoArticulo',$datos);
    }
}
