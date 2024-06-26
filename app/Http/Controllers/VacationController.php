<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vacation;
use App\Models\Incentive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class VacationController extends Controller
{
    public function show(string $id , Request $request)
    {
        $employee = Employee::where('id', $id)->first();

        return view('vacation.history' , compact('employee'));
    }

    public function create(string $id)
    {
        $employee = Employee::find($id);

        $incentives = $employee->incentives()->orderBy('id' , 'DESC')->get();;
        
        return view('vacation.create' , compact('employee' , 'incentives'));
    }

    public function store(Request $request)
    {

        $employee = Employee::find($request->employee_id);

        if($employee->entitlement < $request->entitlement)
        {
            return redirect()->back()-with('fail' , 'مقدار استحقاق وارد شده از استحقاق مانده بیشتر است');
        }

        // maybe we can use this syntax $employee->vacations>create();
        $vacation = new Vacation();

        //check dates not smaller than eachother
        $vacation->start = $request->start;
        $vacation->end = $request->end;
        $vacation->attendance = $request->attendance;

        $employee->entitlement = $employee->entitlement - $request->entitlement ;

        $vacation->entitlement = $request->entitlement;

        if(isset($request->incentive))
        {

            foreach ($request->incentive as $incentive) 
            {
                $incentive = Incentive::find($incentive); // write a senario for fail!

                $vacation->incentive += $incentive->days ; 
                $vacation->IncentiveDescription	 = $incentive->title . "+" . $vacation->IncentiveDescription; 

                $employee->incentives()->detach($incentive);
            }
        }

       
        //check used distance 

        if(isset($request->distance) && $employee->useddistance < 2)
        {
            $vacation->distance = $employee->distance;
            $employee->useddistance +=  1 ;
        }


        $vacation->employee_id = $request->employee_id ;

        $employee->save();
        $vacation->save();

        return redirect()->route('vacation.history', ['id' => $request->employee_id]);
    }

    public function print(int $id)
    {
        $vacation = Vacation::find($id);

        $lastAttendence = DB::select(
            'SELECT attendance
            FROM vacations
            WHERE employee_id = ?
            ORDER BY id DESC
            LIMIT 1,1'
    , [$vacation->employee->id]);

        return view('vacation.print' , compact('vacation' , 'lastAttendence'));
    }

    public function destroy(string $id)
    {

        $this->authorize('delete');

        $vacation = Vacation::find($id);

        $employee = Employee::find($vacation->employee_id);

        $employee->entitlement = $vacation->entitlement + $employee->entitlement ;

        if($vacation->distance > 0)
        {
            $employee->useddistance = $employee->useddistance - 1 ;
        }

        $employee->save();

        $vacation->delete();

        if($vacation)
        {
            return back()->with('success' , 'مرخصی با موفقیت حذف شد');
        }else {
            return back()->with('fail' , 'هنگام حذف مرخصی مشکلی پیش امد');
        }
    }
}
