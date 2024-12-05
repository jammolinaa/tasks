<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PruebaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\UserController;
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



route::resource('users' , Usercontroller::class);


route::resource('tasks' , Taskcontroller::class);
Route::resource('productos', ProductoController::class);
Route::resource('pruebas', PruebaController::class);
Auth::routes();
