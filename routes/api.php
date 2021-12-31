<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatMessageController;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Broadcast;


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
Route::middleware('auth:sanctum')->group(function(){
    Broadcast::routes();
});


Route::group(["prefix" => "auth"] , function(){
    Route::post("register" , [AuthController::class , 'register']);
    Route::post("login" , [AuthController::class , 'login']);

});

Route::group(["middleware" => "auth:sanctum"] , function(){
    Route::group(["prefix" => "chat"] , function(){
        Route::get('messages' , [ChatMessageController::class , 'index']);
        Route::post('messages' , [ChatMessageController::class , 'store']);
    });
    Route::apiResource('/patients',PatientController::class);
    Route::get('/pinfo/{id}',[PatientController::class,'getPatientInfo']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

 