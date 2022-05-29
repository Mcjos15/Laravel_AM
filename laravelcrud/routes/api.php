<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElementosController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('elementos')->group(function(){
    Route::get('/', [ElementosController::class, 'index']);
    Route::post('/', [ElementosController::class, 'store']);
    Route::post('/delete/{id}',[ ElementosController::class, 'destroy']);
    Route::post('/update',[ ElementosController::class, 'update']);
});


