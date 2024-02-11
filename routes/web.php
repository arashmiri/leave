<?php

use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EncouragementController;
use App\Http\Controllers\VacationController;
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

// Route::get('/encouragement', function () {

//     $personel = App\Models\Personnel::find(5);

//     $encouragements = $personel->encouragements()->orderBy('created_at', 'desc')->get();

//     foreach ($encouragements as $encouragement) 
//     {
//         echo "title : " . $encouragement->title; 
//         echo '<br>';
//         echo "days : " . $encouragement->days;
//         echo '<br>';
//     }
// });

//  Route::get('/encouragementBrigade', function () {

//     $encouragements = App\Models\Encouragement::with('personnel')->get();
//     $encouragementsWithAllPersonnel = $encouragements->filter(function($encouragement) {
//         return $encouragement->personnel->count() > 1;
//     });
    
//     foreach ($encouragementsWithAllPersonnel as $encouragement) {

//         echo $encouragement->title;
//         echo '<br>';
//         echo $encouragement->id;
//         echo '<br>';

//     }
//  });

//  Route::get('/encouragementDel', function () {

//     $encouragement = App\Models\Encouragement::find(18);

//     $encouragement->personnel()->detach();

//     // Delete the encouragement
//     $encouragement->delete();

//     // Return a JSON response with a success message
//     return response()->json([
//         'message' => 'مرخصی تشویقی با موفقیت حذف شد',
//     ]);
//  });


require __DIR__.'/auth.php';
