<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/weapons', function () {
    $weapons = Weapons::with('damage')->paginate(20);

    return view('/weapons',[
        'weapons' => $weapons,
    ]);



});

Route::get('/enemies', function () {
    return view('/enemies');
//    dd('Put Enemies Here');
});

require __DIR__.'/settings.php';
