<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReserveringController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Gebruiker geeft mogelijk een datum mee via de url (get) dus url + ?date=2021-03-29
Route::get('/reserveringen', [ReserveringController::class, 'index'])->name('reserveringen.index');

// Bewerk een reservering (formulier)
Route::get('/reserveringen/edit/{id}', [ReserveringController::class, 'edit'])->name('reserveringen.edit');

// Update een reservering (in de database)
Route::put('/reserveringen/update/{id}', [ReserveringController::class, 'update'])->name('reserveringen.update');
