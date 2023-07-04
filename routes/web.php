<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Controller;

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

Route::get('/register', function () {
    return view('register');
});

Route::get('/agent', [AgentController::class, 'index']);
Route::get('/agent/upload', [AgentController::class, 'upload']);
Route::get('/agent/documents', [AgentController::class, 'document']);
Route::get('/agent/archives', [AgentController::class, 'archive']);
Route::get('/agent/logout', [AgentController::class, 'logout']);

Route::get('/sales', [SalesController::class, 'index']);