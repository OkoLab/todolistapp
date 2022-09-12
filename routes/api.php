<?php

use App\Http\Controllers\v1\NotesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::get('/notes', [NotesController::class, 'index']);
Route::prefix('/note')->group(
    function () {
        Route::post('/store', [NotesController::class, 'store']);
        Route::put('/{note}/done', [NotesController::class, 'setDone']);
        Route::put('/{note}/urgent', [NotesController::class, 'setUrgent']);
        Route::delete('/{note}', [NotesController::class, 'destroy']);
    }
);
