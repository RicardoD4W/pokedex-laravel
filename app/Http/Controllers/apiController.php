<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pokemon;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class apiController extends Controller
{
    public function index(){

        try{
            $raw = Http::get('https://pokeapi.co/api/v2/pokemon?limit=1279');
            
            return response()->json(['status'=>'OK', 'data' => $raw['results']]);
        }catch(Exception $e){
            return response()->json(['status'=>'ERROR', 'code' => 500, 'trace'=> $e]);
        }
    }


    public function getPokemonByName($name)    {   

        try{
            $raw = Http::get('https://pokeapi.co/api/v2/pokemon/'.$name);
            
            return response()->json(['status'=>'OK', 'data' => $raw->json()]);
        }catch(Exception $e){
            return response()->json(['status'=>'ERROR', 'code' => 500, 'trace'=> $e]);
        }    
    }

    public function getPokemonByType($type)    {   

        try{
            $raw = Http::get('https://pokeapi.co/api/v2/type/'.$type);
            return response()->json(['status'=>'OK', 'data' => $raw->json()]);
        }catch(Exception $e){
            return response()->json(['status'=>'ERROR', 'code' => 500, 'trace'=> $e]);
        }    
    }
}


