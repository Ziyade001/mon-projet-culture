<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('login', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.photo.update');
    Route::patch('/profile/personal', [ProfileController::class, 'updatePersonal'])->name('profile.personal.update');
    Route::patch('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.address.update');
    Route::patch('/profile/contact', [ProfileController::class, 'updateContact'])->name('profile.contact.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//require __DIR__ . '/front.php';
require __DIR__ . '/admin.php';


