<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PasswordReset;
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


//Sales team
Route::get('/sales', [SalesController::class, 'index']);
Route::get('/sales/upload', [SalesController::class, 'upload']);
Route::get('/sales/documents', [SalesController::class, 'document']);
Route::get('/sales/documents/{id}', [SalesController::class, 'single']);
Route::get('/sales/archives', [SalesController::class, 'archive']);
Route::get('/logout', [SalesController::class, 'logout']);
//JNGI Agents
Route::get('/agents', [AgentController::class, 'index']);
Route::get('/logout', [AgentController::class, 'logout']);

Route::get('/password-reset', [PasswordReset::class, 'reset']);
Route::get('/new-password/{email}/{token}', [PasswordReset::class, 'setpassword'])->name('new-password');
