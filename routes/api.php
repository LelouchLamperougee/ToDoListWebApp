<?php

use App\Http\Controllers\PriorityController;
use App\Http\Controllers\TaskActionController;
use App\Http\Controllers\TaskController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//for TaskController
Route::group(['middleware' => 'auth:sanctum'], function (){
    Route::resource('/tasks', TaskController::class);
    Route::patch('/close/{task}',  [TaskActionController::class, 'closeTask']);
    Route::get('/priorities', [PriorityController::class, 'index']);
});

