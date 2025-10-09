<?php

use Illuminate\Support\Facades\Route;

/* Route::get('/', \App\Livewire\Home::class)->name('home'); */
Route::get('/', \App\Livewire\Landing::class)->middleware('guest')->name('landing');
Route::get('/login', \App\Livewire\Login::class)->middleware('guest')->name('login');
Route::get('/registrasi', \App\Livewire\Registrasi::class)->middleware('guest')->name('registrasi');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard');
    Route::get('/profile', \App\Livewire\Profile::class)->name('profile');
    Route::get('/gejala', \App\Livewire\GejalaCrud::class)->name('gejala');
    Route::get('/penyakit', \App\Livewire\PenyakitCrud::class)->name('penyakit');
    Route::get('/basis-pengetahuan', \App\Livewire\BasisPengetahuan::class)->name('basis-pengetahuan');
    Route::get('/diagnosis', \App\Livewire\Diagnosis::class)->name('diagnosis');
    Route::get('/logout', \App\Http\Controllers\LogoutController::class)->name('logout');
});
