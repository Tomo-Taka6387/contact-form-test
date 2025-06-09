<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm'])->name('contacts.confirm');
Route::post('/contacts', [ContactController::class, 'store']);
Route::post('/contact', [ContactController::class, 'handle'])->name('contact.handle');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.form');
Route::get('/thanks', function () {
    return view('thanks');
})->name('contact.thanks');
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'index'])->name('dashboard');
    Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(['guest'])->name('login');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contact.show');
});
