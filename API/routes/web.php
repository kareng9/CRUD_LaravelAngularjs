<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('/personas/hola', function (Request $request) {
    return "imprimir este mensaje";
});
//Route::resource('personas','PersonaController'); //personas es la ruta que especificamos en PersonaService.js
Route::post('/personas', [PersonaController::class,'store']);
Route::get('/personas', [PersonaController::class,'index']);
Route::put('/personas', [PersonaController::class,'update']);
//Route::get('/personas', [PersonaController::class,'show']);
Route::delete('/personas', [PersonaController::class,'destroy']);

