<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\UserController;
use App\Models\Kelas;

Route::get('/user/profile', [UserController::class,
'profile']);

Route::get('/user/create', [UserController::class,
'create']);

Route::post('/user/store', [UserController::class,
'store'])->name('user.store');

Route::get('/create_user', [UserController::class, 'create']);

Route::get('/user', [UserController::class, 'index'])->name('user.index');