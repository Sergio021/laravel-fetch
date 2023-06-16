<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuariosController;

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

Route::get('/', [UsuariosController::class,'index'])->name('index');

Route::post('autenticar', [UsuariosController::class,'autenticar'])->name('autenticar');

Route::get('usuarios', [UsuariosController::class,'usuarios'])->name('usuarios');

Route::get('listar', [UsuariosController::class,'listar'])->name('listar');
Route::post('agregar', [UsuariosController::class,'agregar'])->name('agregar');
Route::post('modificar', [UsuariosController::class,'modificar'])->name('modificar');
Route::delete('eliminar', [UsuariosController::class,'eliminar'])->name('eliminar');
Route::get('cerrarSesion', [UsuariosController::class,'cerrarSesion'])->name('cerrarSesion');