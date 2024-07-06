<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\ProjectCtroller;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});


Route::middleware('auth')
    ->prefix('admin') // Prefisso nell'url delle rotte di questo gruppo
    ->name('admin.') // inizio di ogni nome delle rotte del gruppo
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('projects', ProjectCtroller::class)->parameters(['projects'=> 'project:slug']);

        Route::resource('leads', LeadController::class)->except(['create', 'store', 'edit']);
    });

require __DIR__ . '/auth.php';
