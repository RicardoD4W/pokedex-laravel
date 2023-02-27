<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pokemons', 'PokemonController@index')->name('pokemons');
    Route::get('/pokemon/searchName', 'PokemonController@searchByName')->name('pokemon.searchByName');
    Route::get('/pokemon/searchType', 'PokemonController@searchByType')->name('pokemon.searchByType');
    Route::get('/pokemon/{nombre}', 'PokemonController@pokemon')->name('pokemon');
    Route::get('/pokedex', 'PokemonController@pokedex')->name('pokedex');
    Route::post('/add/pokemon/{nombre}', 'PokemonController@addPokemon')->name('pokemon.add');
    Route::get('/delete/pokemon/{id}', 'PokemonController@deletePokemon')->name('pokemon.delete');
    Route::get('/change/pokemon/{id}', 'PokemonController@changeMote')->name('pokemon.changeMote');
    Route::get('/actualizarMote', 'PokemonController@actualizarMote')->name('pokemon.actualizarMote');
});

require __DIR__.'/auth.php';

