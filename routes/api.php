<?php

use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\ViolationaController;
use App\Http\Controllers\API\WalisantriController;
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

// Route::get('walisantri', [WalisantriController::class, 'index']);
// Route::post('walisantri/store', [WalisantriController::class, 'store']);
// Route::get('walisantri/show/{id}', [WalisantriController::class, 'show']);
// Route::post('walisantri/update/{id}', [WalisantriController::class, 'update']);
// Route::get('walisantri/destroy/{id}', [WalisantriController::class, 'destroy']);

Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logoutwali', [LoginController::class, 'logoutwali']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
Route::post('violationa', [ViolationaController::class, 'store']);
Route::get('getdata', [ViolationaController::class, 'getData']);
});

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::post('/registerwali', [LoginController::class, 'register']);
// Route::post('/loginwali', [LoginController::class, 'login']);
// Route::middleware('auth:sanctum')->group(function(){
//     Route::post('/logout', [LoginController::class, 'logout']);
//     Route::get('/registeruser', function(Request $request){
//         return $request->user();
//     });
// });

