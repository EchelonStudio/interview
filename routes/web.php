<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::controller(NoteController::class)->group(function () {

        Route::get('/notes', 'index')->name('notes.index');
        Route::post('/notes', 'store')->name('notes.store');
        Route::get('/notes/{note_id}', 'show')->name('notes.show');
        Route::post('/note/edit/{note_id}', 'update')->name('notes.update');
        Route::delete('/note/delete/{id}', 'destroy')->name('notes.destroy');

    });

    Route::get('/weather/{city}', [WeatherController::class , 'getWeather'])->name('weather');

    Route::get('/account/transfer', function(){

        return view('user.transfer');
        
    })->name('user.transfer');


    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});





require __DIR__.'/auth.php';
