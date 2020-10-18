<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Http;
use Illuminate\Support\Facades\Http as FacadesHttp;

class ApiController extends Controller
{
    public function index(){
        
        $url= 'https://newsapi.org/v2/top-headlines?country=us&apiKey=51f17c28b558427abdc5b93619c04a2a';
        $response = file_get_contents($url);
        
        $datos['noticias'] = json_decode($response);
        
        return view('api.index',$datos);
        
    }
}
