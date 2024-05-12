<?php

use App\Livewire\Auth\Login;
use App\Livewire\HistoriquePage;
use App\Livewire\HomePage;
use App\Livewire\PermisPage;
use App\Livewire\UserPage;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');

Route::middleware('guest')->get('/login', Login::class)->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/liste_permis', PermisPage::class)->name('liste_permis');
    Route::get('/historique', HistoriquePage::class)->name('historique');
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
});

// Apply the middleware to the route
Route::middleware(['auth', \App\Http\Middleware\CheckUserRole::class . ':administrateur'])->group(function () {
    Route::get('/users', UserPage::class)->name('users');
});

