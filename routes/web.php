<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\IncentiveController;
use Illuminate\Support\Facades\DB;
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

    // $lastAttendence = DB::select(
    //    'SELECT attendance
    //     FROM vacations
    //     WHERE employee_id = ?
    //     ORDER BY id DESC
    //     LIMIT 1,1'
    // , [1]);
    
    // echo $lastAttendence[0]->attendance ;

    function getHolidaysBetweenDates($startDate, $endDate, $holidays) {
        $startTimestamp = strtotime($startDate);
        $endTimestamp = strtotime($endDate);

        //dd($startDate);
    
        $holidayCount = 0;
    
        for ($currentDate = $startTimestamp; $currentDate <= $endTimestamp; $currentDate += 86400) {
            // Check if the current date is a holiday
            $currentDateFormatted = date('Y-m-d', $currentDate);
            if (in_array($currentDateFormatted, $holidays)) {
                $holidayCount++;
            }
        }
    
        return $holidayCount;
    }
    
    // Example usage
    $startDate = '2024-99-99';
    $endDate = '2024-99-99';
    
    // List of holidays (replace this with your actual list of holidays)
    $holidays = ['2024-01-01', '2024-12-25'];
    
    $result = getHolidaysBetweenDates($startDate, $endDate, $holidays);
    
    echo "Number of holidays between $startDate and $endDate: $result";

})->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('employees', EmployeeController::class)->middleware('auth');


Route::get('/vacation/{id}', [VacationController::class , 'create'])->middleware('auth')->name('vacation.create');

Route::post('/vacation', [VacationController::class , 'store'])->middleware('auth')->name('vacation.store');

Route::get('employees/{id}/vacation' , [VacationController::class , 'show'] )->middleware('auth')->name('vacation.history');

Route::delete('/vacations/{vacation}', [VacationController::class , 'destroy'])->middleware('auth')->name('vacations.destroy');

Route::get('/incentive/create', [IncentiveController::class, 'create'])->name('incentive.create');

Route::post('/incentive', [IncentiveController::class , 'store'])->name('incentive.store');

Route::post('/incentiveMany', [IncentiveController::class , 'storeMany'])->name('incentiveMany.store');

Route::get('/incentiveBrigade', [IncentiveController::class, 'index'])->name('incentiveBrigade.index');

Route::get('/employees/{id}/incentive' , [IncentiveController::class, 'show'])->name('employee.insentive');

Route::delete('/incentive/{id}', [IncentiveController::class, 'destroy'])->name('incentive.destroy');

Route::get('/statistics', [StatisticController::class, 'index'])->name('statistics.index');

Route::post('/statistics', [StatisticController::class,'ends'])->name('statistics.ends');

Route::post('/statisticss', [StatisticController::class,'attendance'])->name('statistics.attendance');

Route::get('/vacations/{vacation}/print', [VacationController::class, 'print'])->name('vacations.print');

require __DIR__.'/auth.php';
