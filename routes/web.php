<?php

use Illuminate\Support\Facades\Route;

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
    return view('event');
});

Route::get('/login', function () {
    return redirect()->route('filament.admin.auth.login');
})->name('login');


Route::get('evento', [\App\Http\Controllers\EventController::class, 'index'])->name('view.event');

Route::get('/evento/{slug}', \App\Livewire\ViewEvent::class)->name('view.event');
