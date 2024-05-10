<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [SessionController::class, 'index']);
Route::get('/buatSession', [SessionController::class, 'buatSession']);
Route::get('/aksesSession', [SessionController::class, 'aksesSession']);
Route::get('/hapusSession', [SessionController::class, 'hapusSession']);
Route::get('/flashSession', [SessionController::class, 'flashSession']);
