<?php

namespace App\Http\Controllers;

use App\Http\Controllers\apiController as pokeController;
use App\Models\pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;


class PokemonController extends Controller
{
    //
    public function index()
    {
        $pokeController = new pokeController();
        $query = $_GET['query'] ?? null;
        $type = $_GET['type'] ?? null;
        if ($query != null) {
            return $raw = null;
            if ($type != null) {
                return $raw = null;
            }
        } else {
            $raw = $pokeController->index();
        }

        return view('pokemons', ['raw' => $raw->getData()->data]);
    }

    public function pokedex()
    {
        $raw = pokemon::all()->where('userId', Auth::id());
        return view('pokedex', ['raw' => $raw]);
    }

    public function pokemon($nombre)
    {
        $pokeController = new pokeController();
        $raw = $pokeController->getPokemonByName($nombre);

        return view('pokemon', ['raw' => $raw->getData()->data]);
    }

    public function addPokemon($name)
    {
        $userId =  Auth::user()->id;
        pokemon::create([
            'name' => $name,
            'userId' => $userId,
            'imagePkm' => request('imagePkm'),
            'mote' => ''
        ]);
        return redirect()->action([PokemonController::class, 'index']);
    }

    public function searchByName()
    {
        $query = request('query');
        $pokeController = new pokeController();

        $raw = $pokeController->getPokemonByName($query);
        if ($raw->getData()->data == null) {
            return view('welcome');
        } else {
            return view('pokemon', ['raw' => $raw->getData()->data]);
        }
    }

    public function searchByType()
    {
        $query = request('type') ?? 3;
        $pokeController = new pokeController();

        $row = $pokeController->getPokemonByType($query);
        //var_dump($raw->getData()->data->pokemon[0]->pokemon->name);
        return view('pokemons', ['row' => $row->getData()->data]);
    }

    public function deletePokemon($id){    
        pokemon::destroy($id);

        $raw = pokemon::all()->where('userId', Auth::id());
        return view('pokedex', ['raw' => $raw]);
    }

    public function changeMote($id){
        $name = pokemon::find($id)->name;
        return view('changeMote', ['id' => $id, 'name'=>$name]);
    }

    public function actualizarMote(){
        $mote = request('mote');
        $id = request('id');

        $pkm = pokemon::find($id);
        $pkm->mote = $mote;
        $pkm->save();


        $raw = pokemon::all()->where('userId', Auth::id());
        return view('pokedex', ['raw' => $raw]);
    }
}
