<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'authapi'], function(){


Route::post('/registeruser', [App\Http\Controllers\AppUserController::class, 'registeruser']);
Route::post('/login', [App\Http\Controllers\AppUserController::class, 'login']);
Route::post('/update', [App\Http\Controllers\AppUserController::class, 'update']);
Route::post('/passwordupdate', [App\Http\Controllers\AppUserController::class, 'passwordupdate']);
Route::post('/user/show', [App\Http\Controllers\AppUserController::class, 'show']);



Route::get('/messages', [App\Http\Controllers\AppUserController::class, 'fetchmessage']);

Route::post('/sendmessage', [App\Http\Controllers\AppUserController::class, 'sendMessage']);


Route::post('/video_chat', [App\Http\Controllers\AppUserController::class, 'index_chat']);


//complain route 
Route::post('/complain', [App\Http\Controllers\ComplainController::class, 'index']);
Route::post('/complain/show', [App\Http\Controllers\ComplainController::class, 'put']);

//suggeation 
Route::post('/suggestion', [App\Http\Controllers\SuggestionController::class, 'index']);
Route::post('/suggestion/show', [App\Http\Controllers\SuggestionController::class, 'put']);

//media project api 
Route::get('/medias', [App\Http\Controllers\Mediacontroller::class, 'show']);



//media project api 
Route::get('/project', [App\Http\Controllers\ProjectController::class, 'show']);
});
