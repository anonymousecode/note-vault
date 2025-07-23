<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register','register');

Route::get('/dashboard',[NotesController::class, 'fetchNotes'])->name('dashboard');

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
Route::post('/save',[NotesController::class,'save'])->name('save');
