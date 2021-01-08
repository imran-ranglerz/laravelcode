<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index']);

//appuser
Route::get('/appuser', [App\Http\Controllers\AppUserController::class, 'index']);
Route::get('/appuser/{id}', [App\Http\Controllers\AppUserController::class, 'destroy'])->name('appuser');

//complains
Route::get('/ucomplains', [App\Http\Controllers\ComplainController::class, 'show']);
Route::get('/ucomplains/{id}', [App\Http\Controllers\ComplainController::class, 'destroy'])->name('ucomplains');


//suggestion
Route::get('/usuggestions', [App\Http\Controllers\SuggestionController::class, 'show']);
Route::get('/usuggestions/{id}', [App\Http\Controllers\SuggestionController::class, 'destroy'])->name('usuggestions');


//media project 
Route::get('/medias', [App\Http\Controllers\Mediacontroller::class, 'index']);
Route::post('/medias', [App\Http\Controllers\Mediacontroller::class, 'store'])->name('medias');
Route::get('/medias/show', [App\Http\Controllers\Mediacontroller::class, 'get']);
Route::get('/medias/destroy/{id}', [App\Http\Controllers\Mediacontroller::class, 'destroy'])->name('medias/destroy');



//project
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index']);
Route::post('/projects', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects');

Route::get('/projects/show', [App\Http\Controllers\ProjectController::class, 'get']);
Route::get('/projects/destroy/{id}', [App\Http\Controllers\ProjectController::class, 'destroy'])->name('projects/destroy');