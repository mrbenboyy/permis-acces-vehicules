<?php

use App\Livewire\Auth\Login;
use App\Livewire\HomePage;
use App\Livewire\UserPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/login', Login::class)->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/users', UserPage::class)->name('users');
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
});
