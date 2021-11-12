<?php

use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
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

// Route::resource('to_dos', ToDoController::class);

// Public routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/to_dos', [ToDoController::class, 'index']);
Route::get('/to_dos/{id}', [ToDoController::class, 'show']);
Route::get('/to_dos/search/{item}', [ToDoController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/to_dos', [ToDoController::class, 'store']);
    Route::put('/to_dos/{id}', [ToDoController::class, 'update']);
    Route::delete('/to_dos/{id}', [ToDoController::class, 'destroy']);
    Route::post('/logout', [UserController::class, 'logout']);
});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});