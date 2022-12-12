<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JogosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApostaController;

// Crud Admin
Route::post('/admin/create', [AdminController::class, 'create_admin'])->name('create.admin');

// Crud User
Route::post('/user', [UserController::class, 'create'])->name('create.user');
Route::put('/user/{id}', [UserController::class, 'update'])->name('update.user');
Route::delete('/user/{id}', [UserController::class, 'delete'])->name('delete.user');
Route::get('/admin/show', [UserController::class, 'show'])->name('show.users');

//Crud Jogos
Route::get('/jogos/show', [JogosController::class, 'show'])->name('show.jogos');
Route::post('jogos/create', [JogosController::class, 'create'])->name('create.jogos');
Route::delete('/jogos/{id}', [JogosController::class, 'delete'])->name('delete.jogos');
Route::put('/jogos/{id}', [JogosController::class, 'update'])->name('update.jogos');

//Rotas para Admin
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('logout.admin');
Route::get('/jogos/{id}', [AdminController::class, 'update_jogos'])->name('jogos.update');
Route::get('/admin/jogos', [AdminController::class, 'create_jogos'])->name('admin.jogos');
Route::get('/admin/create', [AdminController::class, 'create_users'])->name('create.admin');
Route::get('/admin/index', [AdminController::class, 'index'])->name('index.admin');
Route::get('/admin/login', [AdminController::class, 'login_admin'])->name('login.admin');
Route::get('/admin/{id}', [AdminController::class, 'update_user'])->name('update');

Route::post('/apostas/update', [ApostaController::class, 'update'])->name('apostas.update')->middleware('auth');
Route::resource('apostas', ApostaController::class)->except(['update']);
Route::get('/apostas', [ApostaController::class, 'index'])->name('apostas')->middleware('auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/cadastrar', [LoginController::class, 'cadastrar'])->name('cadastrar');
Route::post('/admin/login', [AdminController::class, 'login'])->name('login.adm');


Route::get('/', [HomeController::class, 'index'])->name('welcome');
