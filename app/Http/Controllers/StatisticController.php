<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Personnel;
use App\Models\Vacation;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $personnelCounts = Employee::select('address', DB::raw('count(*) as personnel_count'))
        ->groupBy('address')
        ->get();

        return view('statistic.index', compact('personnelCounts'));
    }

    public function attendance(Request $request)
    {   
        $vacations = Vacation::with('employee')
        ->where('attendance', '=', $request->attendance)
        ->get()
        ->map(function ($vacation) {
            return $vacation->employee->name;
        });

        return view('statistic.index', compact('vacations'));
    }

    public function ends(Request $request)
    {   
        $vacations = Vacation::with('employee')
        ->whereDate('end', '>=', $request->endDate)
        ->get()
        ->map(function ($vacation) {
            return $vacation->employee->name;
        });

        return view('statistic.index', compact('vacations'));
    }
}

