<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        //It is better to get only the information we need from the employee table 
        $employees = Employee::orderBy('id' , 'DESC')->paginate(50);

        if(isset($request['search']))
        {
            if(ctype_digit($request['search']))
            {
                $employees = DB::table('employees')
                ->where('code', 'like', '%' . $request['search'] . '%')
                ->paginate(50);
            }
            else
            {
                $employees = DB::table('employees')
                ->where('name', 'like', '%' . $request['search'] . '%')
                ->paginate(50);
            }
        }

        return view('employee.index' , compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $employee = new Employee();


        //use modern laravel crud (look at profile controller)

        $employee->name = $request['name'];
        $employee->rank = $request['rank'];
        $employee->code = $request['code'];
        $employee->battalion = $request['battalion'];
        $employee->entitlement = $request['entitlement'];
        $employee->image = 'LF' . $request['code'] . '.png';

        $province = Province::where('name', $request['address'])->first();

        //Remove this function from inside the controller

        function calculateDistance($lat1, $lon1, $lat2, $lon2) {
            // تبدیل درجه به رادیان
            $lat1 = deg2rad($lat1);
            $lon1 = deg2rad($lon1);
            $lat2 = deg2rad($lat2);
            $lon2 = deg2rad($lon2);
        
            // مختصات دو نقطه
            $dlat = $lat2 - $lat1;
            $dlon = $lon2 - $lon1;
        
            // فرمول هاوسدورف
            $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
            $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        
            // شعاع کره زمین (متوسط شعاع زمین: 6371 کیلومتر)
            $radius = 6371;
        
            // محاسبه فاصله
            $distance = $radius * $c;

            //تبدیل مایل به کیلومتر
            $distance = $distance * 1.609344;
        
            return $distance;
        }

        $distance = calculateDistance(27.20 , 60.68 , $province->latitude , $province->longitude);

        if($distance > 0)
        {
            if ($distance <= 500) {
                $employee->distance = 1 ;
            } elseif($distance <= 1000) {
                $employee->distance = 2 ;
            } elseif($distance > 1000) {
                $employee->distance = 3 ;
            }
            
        }else
        {
            return back()->with('fail' , 'نام استان وارد شده اشتباه است' );   
        }
     
        $employee->useddistance = '0' ;

        $employee->address = $request['address'];

        $employee->save();

        if($employee)
        {
            return back()->with('success' , 'کارمند با موفقیت اضافه شد');
        }else
        {
            return back()->with('fail' , 'هنگام ثبت کارمند مشکلی به وجود آمد' );   
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //its better to use find by id if $id is employee id
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //its better to use find by id if $id is employee id
        $response = Gate::authorize('view', Employee::find($id));

        if ($response->deny()) {
            echo $response->message();
        }

        $employee = Employee::find($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //its better to use find by id if $id is employee id
        $employee = Employee::find($id);

         //use modern laravel crud (look at profile controller)

         $employee->name = $request['name'];
         $employee->rank = $request['rank'];
         $employee->code = $request['code'];
         $employee->battalion = $request['battalion'];
         $employee->entitlement = $request['entitlement'];
         $employee->image = 'LF' . $request['personnel_code'] . '.png';
         $employee->address = $request['address'];

         $employee->useddistance = $request['useddistance'] ;

         $province = Province::where('name', $request['address'])->first();
 
         //Remove this function from inside the controller
 
         function UpdateDistance($lat1, $lon1, $lat2, $lon2) {
             // تبدیل درجه به رادیان
             $lat1 = deg2rad($lat1);
             $lon1 = deg2rad($lon1);
             $lat2 = deg2rad($lat2);
             $lon2 = deg2rad($lon2);
         
             // مختصات دو نقطه
             $dlat = $lat2 - $lat1;
             $dlon = $lon2 - $lon1;
         
             // فرمول هاوسدورف
             $a = sin($dlat / 2) ** 2 + cos($lat1) * cos($lat2) * sin($dlon / 2) ** 2;
             $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
         
             // شعاع کره زمین (متوسط شعاع زمین: 6371 کیلومتر)
             $radius = 6371;
         
             // محاسبه فاصله
             $distance = $radius * $c;
 
             //تبدیل مایل به کیلومتر
             $distance = $distance * 1.609344;
         
             return $distance;
         }
 
         $distance = UpdateDistance(27.20 , 60.68 , $province->latitude , $province->longitude);
 
         if($distance > 0)
         {
             if ($distance <= 500) {
                 $employee->distance = 1 ;
             } elseif($distance <= 1000) {
                 $employee->distance = 2 ;
             } elseif($distance > 1000) {
                 $employee->distance = 3 ;
             }
             
         }else
         {
             return back()->with('fail' , 'نام استان وارد شده اشتباه است' );   
         }
       
        $employee->save();
        
        if($employee)
        {
            //return back()->with('success' , 'کاربر با موفقیت ویرایش شد');
 
            return redirect()->route('employees.show', $employee->id)->with('success' , 'کاربر با موفقیت ویرایش شد');
        }else
        {
            return back()->with('fail' , 'هنگام ویرایش کاربر مشکی به وجود امد' );   
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //its better to use find by id if $id is employee id
        $employee = Employee::find($id);

        $employee->delete();

        if($employee)
        {
            return redirect()->route('employees.index')->with('success' , 'کاربر با موفقیت حذف شد');
        }else {
            return back()->with('fail' , 'هنگام حذف پرسنل مشکلی پیش امد');
        }
    }
}
