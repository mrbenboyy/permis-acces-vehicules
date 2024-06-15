<?php

use App\Livewire\Archive;
use App\Livewire\Auth\Login;
use App\Livewire\EditPermisPage;
use App\Livewire\HistoriquePage;
use App\Livewire\HomePage;
use App\Livewire\PermisFormPage;
use App\Livewire\PermisPage;
use App\Livewire\UserInformationsPage;
use App\Livewire\UserPage;
use App\Livewire\ViewPermis;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->get('/login', Login::class)->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/', HomePage::class)->name('home');
    Route::get('/liste_permis', PermisPage::class)->name('liste_permis');
    Route::get('/liste_permis/ajouter_permis', PermisFormPage::class)->name('ajouter_permis');
    Route::get('/liste_permis/permis/{id}', ViewPermis::class)->name('voir_permis');
    Route::get('/liste_permis/edit/{id}', EditPermisPage::class)->name('edit_permis');
    Route::get('/historique', HistoriquePage::class)->name('historique');
    Route::get('/user/{id}', UserInformationsPage::class)->name('user_details');
    Route::get('/archives', Archive::class)->name('archives');
    Route::get('/logout', function () {
        auth()->logout();
        return redirect('/');
    });
});

// Apply the middleware to the route
Route::middleware(['auth', \App\Http\Middleware\CheckUserRole::class . ':administrateur'])->group(function () {
    Route::get('/users', UserPage::class)->name('users');
});

