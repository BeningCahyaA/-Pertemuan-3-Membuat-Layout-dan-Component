<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function () {
    return "
    <div Style = 'text-align: center;'>
        Selamat datang di halaman home
        <br><br>
        <a href='/makanan'>
        Makanan
        </a>
        <br></br>
        <a href='/minuman'>
        Minuman
        </a>
        <br></br>
        <a href='/makanan hits'>
        Makanan Hits
        </a>
        <br></br>
        <a href='/order'>
        Order
        </a>
    </div>
    ";
});

Route::get('/makanan', function () {
    return 'Ini adalah halaman makanan';
});

Route::get('/minuman', function () {
    return 'Ini adalah halaman minuman';
});

Route::get('/makanan hits', function () {
    return 'Ini adalah halaman makanan hits';
});

Route::get('/order', function () {
    return 'Ini adalah halaman order';
});

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
