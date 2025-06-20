<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/profile', \App\Livewire\Profile::class)->name('profile');
