<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Encouragement;
use App\Models\Incentive;
use App\Models\Personnel;

class IncentiveController extends Controller
{

    public function index()
    {
        $incentives = Incentive::with('employee')->get();
        $incentivesWithAllEmployee = $incentives->filter(function($incentives) {
            return $incentives->employee->count() > 1;
        });
        
        return view('incentive.index', compact('incentivesWithAllEmployee'));
    }

    public function show(string $id)
    {
        $incentives = Employee::find($id)->incentives()->orderBy('id' , 'DESC')->get();;

        return view('employee.insentive' , compact('incentives'));
    }
    public function create()
    {
        return view('incentive.create');
    }
    public function store(Request $request)
    {
        $incentive = Incentive::create($request->only(['title', 'days']));

        //check if user found!
        $employee = Employee::where('code' , '=' , $request['code'])->first();

        $incentive->employee()->attach($employee->id);

        return redirect()->route('employee.insentive' , $employee->id);
    }

    public function storeMany(Request $request)
    {
        $incentive = Incentive::create($request->only(['title', 'days']));

        $employees = Employee::all();

        // Attach personnel to the encouragement
        foreach ($employees as $employee)
        {
            $incentive->employee()->attach($employee->id);
        }

        return back()->with('success', 'مرخصی تشویقی با موفقیت برای همه کارمندان ثبت شد.');
    }

    public function destroy(int $id)
    {

        $this->authorize('delete');
        // Detach personnel before deleting the encouragement
        $encouragement = Incentive::find($id);

        $encouragement->employee()->detach();
    
        // Delete the encouragement
        $encouragement->delete();
    
        if ($encouragement) {
        // Return a JSON response with a success message
        return back()->with('success', 'مرخصی تشویقی با موفقیت حذف شد.');
        }
        else
        {
            return back()->with('fail', 'هنگام حذف مرخصی تشویقی مشکلی به وجود آمد');
        }
    }  
}