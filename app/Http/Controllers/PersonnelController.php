<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $personnels = Personnel::orderBy('id' , 'DESC')->get();

        if(isset($request['search']))
        {
            if(ctype_digit($request['search']))
            {
                $personnels = DB::table('personnels')
                ->where('personnel_code', 'like', '%' . $request['search'] . '%')
                ->get();
            }
            else
            {
                $personnels = DB::table('personnels')
                ->where('name', 'like', '%' . $request['search'] . '%')
                ->get();
            }
        }

        return view('personnel.index' , compact('personnels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('personnel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $personnel = new Personnel();

        $personnel->personnel_code = $request['personnel_code'];
        $personnel->name = $request['name'];
        $personnel->rank = $request['rank'];
        $personnel->battalion = $request['battalion'];
        $personnel->entitlement = $request['entitlement'];
        //$personnel->distance = $request['distance'];
        //$personnel->address = $request['address'];
        $personnel->image = 'LF' . $request['personnel_code'] . '.png';

        $province = Province::where('name', $request['address'])->first();

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
                $personnel->distance = 1 ;
            } elseif($distance <= 1000) {
                $personnel->distance = 2 ;
            } elseif($distance > 1000) {
                $personnel->distance = 3 ;
            }
            
        }else
        {
            return back()->with('fail' , 'نام استان وارد شده اشتباه است' );   
        }
     
        $personnel->save();

        if($personnel)
        {
            return back()->with('success' , 'کاربر با موفقیت اضافه شد');
        }else
        {
            return back()->with('fail' , 'هنگام ثبت کاربر مشکی به وجود امد' );   
        }

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $personnel = Personnel::find($id);
        return view('personnel.show', compact('personnel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Gate::authorize('view', Personnel::find($id));

        if ($response->deny()) {
            echo $response->message();
        }

        $personnel = personnel::find($id);
        return view('personnel.edit', compact('personnel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personnel = Personnel::find($id);

        $personnel->personnel_code = $request['personnel_code'];
        $personnel->name = $request['name'];
        $personnel->rank = $request['rank'];
        $personnel->battalion = $request['battalion'];
        $personnel->entitlement = $request['entitlement'];
        $personnel->distance = $request['distance'];
        $personnel->address = $request['address'];
        $personnel->image = 'LF' . $request['personnel_code'] . '.png';
     
        $personnel->save();
        
        if($personnel)
        {
            return back()->with('success' , 'کاربر با موفقیت ویرایش شد');
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
        $personnel = Personnel::find($id);

        $personnel->delete();

        if($personnel)
        {
            return redirect('/personnels')->with('success' , 'کاربر با موفقیت حذف شد');
        }else {
            return back()->with('fail' , 'هنگام حذف پرسنل مشکلی پیش امد');
        }
    }

    function arrayHasOnlyInts($array) 
    {
        return $array === array_filter($array, 'is_int');
    }
}
