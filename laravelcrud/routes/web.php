<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElementosController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('elementos')->group(function(){
    Route::get('/', [ElementosController::class, 'index']);
    Route::post('/', [ElementosController::class, 'store']);
    Route::post('/delete/{id}',[ ElementosController::class, 'destroy']);
    Route::post('/update',[ ElementosController::class, 'update']);
});
