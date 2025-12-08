<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguesController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TypeContenuController;
use App\Http\Controllers\ContenuController;
use App\Http\Controllers\TypeMediaController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UtilisateurController;


Route::middleware(['auth'])->group(function () {
Route::resource('langues', LanguesController::class);
Route::resource('regions', RegionController::class);
Route::resource('type_contenus', TypeContenuController::class);
Route::resource('contenus', ContenuController::class);
Route::resource('type_medias', TypeMediaController::class);
Route::resource('medias', MediaController::class);
Route::resource('commentaires', CommentaireController::class);
Route::resource('roles', RoleController::class);
Route::resource('utilisateurs', UtilisateurController::class);
Route::patch('/utilisateurs/{utilisateur}/toggle-status', [UtilisateurController::class, 'toggleStatus'])->name('utilisateurs.toggle-status');
Route::get('/contenu/{id}/payer', [PaymentController::class, 'payer'])->name('payment.payer');
Route::get('/payment/callback', [PaymentController::class, 'callback'])->name('payment.callback');
Route::get('/contenu/{id}/checkout', [PaymentController::class, 'checkout'])->name('payment.checkout');
if (app()->environment('local')) {
    Route::get('/payment/{id}/simulate', [PaymentController::class, 'simulate'])->name('payment.simulate');
}
});