<?php

use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EncouragementController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Auth;
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

})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('personnels', PersonnelController::class)->middleware('auth');


Route::get('/vacation/{id}', [VacationController::class , 'create'])->middleware('auth')->name('vacation.create');

Route::post('/vacation', [VacationController::class , 'store'])->middleware('auth')->name('vacation.store');

Route::get('personnels/{id}/vacation' , [VacationController::class , 'show'] )->middleware('auth')->name('vacation.history');

Route::delete('/vacations/{vacation}', [VacationController::class , 'destroy'])->middleware('auth')->name('vacations.destroy');

Route::get('/encouragement/create', [EncouragementController::class, 'create'])->name('encouragement.create');

Route::post('/encouragement', [EncouragementController::class , 'store'])->name('encouragement.store');

Route::post('/encouragementMany', [EncouragementController::class , 'storeMany'])->name('encouragementMany.store');

Route::get('/encouragementBrigade', [EncouragementController::class, 'index'])->name('encouragementBrigade.index');

Route::get('/personnels/{id}/encouragement' , [EncouragementController::class, 'show'])->name('personnel.encouragement');

Route::delete('/encouragement/{id}', [EncouragementController::class, 'destroy'])->name('encouragement.destroy');

Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');

Route::post('/statistics', [StatisticController::class,'ends'])->name('statistics.ends');

Route::post('/statisticss', [StatisticController::class,'attendance'])->name('statistics.attendance');


require __DIR__.'/auth.php';
