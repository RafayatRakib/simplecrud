<?php

use App\Http\Controllers\EmployController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
})->name('/');



Route::middleware('auth')->group(function(){
    Route::get('/index',[EmployController::class, 'index']);
    Route::post('/employe/add',[EmployController::class, 'add']);
    Route::get('/all/employer', [EmployController::class, 'getData']);
    Route::get('get/employer/{id}', [EmployController::class, 'getEmployer']);
    Route::post('/employe/update',[EmployController::class, 'update']);
    Route::post('/employe/delete',[EmployController::class, 'delete']);
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
