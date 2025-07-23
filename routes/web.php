<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/register','register');
Route::view('/reset','resetpass')->name('reset');

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/reset',[AuthController::class,'resetPassword'])->name('resetPassword');

Route::middleware(['auth'])->group(function () {

    Route::view('/note-vault/changepass','changepass')->name('changepass');

    Route::get('/dashboard',[NotesController::class, 'fetchNotes'])->name('dashboard');

    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
    Route::post('/save',[NotesController::class,'save'])->name('save');

    Route::post('/changepass',[AuthController::class,'changePassword'])->name('updatePassword');

    Route::post('/delete/{id}',[NotesController::class,'delete'])->name('delete');

});