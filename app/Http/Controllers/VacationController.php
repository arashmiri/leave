<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Vacation;
use App\Models\Encouragement;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    public function show(string $id , Request $request)
    {

        $personnel = Personnel::find($id);

        $vacations = Personnel::find($id)->vacations()->orderBy('id' , 'DESC')->get();;

        return view('personnel.vacation' , compact('vacations' , 'personnel'));
    }

    public function create(string $id)
    {
        $personnel = Personnel::find($id);

        $encouragements = $personnel->encouragements()->orderBy('id' , 'DESC')->get();;
        
        return view('vacation.create' , compact('personnel' , 'encouragements'));
    }

    public function store(Request $request)
    {

        //dd($request);

        $personnel = Personnel::find($request->personnel_id);

        $vacation = new Vacation();


        //check dates not smaller than eachother
        $vacation->start = $request->start ;
        $vacation->end = $request->end ;
        $vacation->attendance = $request->attendance ;


        //check entitlement 
        if($personnel->entitlement < $request->entitlement)
        {
            dd('میزان استحقاق وارد شده از میزان استحقاق مانده بیشتر است');
        }

        $personnel->entitlement = $personnel->entitlement - $request->entitlement ;

        $vacation->entitlement = $request->entitlement;

        //check if used encouragement 
        // if ( !empty ( $request->encouragement )  ) 
        // {
        //     if( empty($request->encouragementDescription) )
        //     {
        //         dd('encouragementDescription is empty');
        //     }
        // }

        // if ( !empty ( $request->encouragementDescription )  ) 
        // {
        //     if( empty($request->encouragement) )
        //     {
        //         dd('encouragement is empty');
        //     }
        // }

        if(isset($request->encouragement))
        {

            //dd($request->encouragement);
            foreach ($request->encouragement as $encouragement) 
            {
                $value = Encouragement::find($encouragement);

                $vacation->encouragement = $value->days + $vacation->encouragement; 
                $vacation->encouragementDescription = $value->title . "-" . $vacation->encouragementDescription; 

                $personnel->encouragements()->detach();
            }
        }

       
        //check if used distance 

            if($personnel->useddistance < 2)
            {
                $vacation->distance = $personnel->distance;
                $personnel->useddistance = $personnel->useddistance + 1 ;
            }


        $vacation->personnel_id = $request->personnel_id ;

        $personnel->save();
        $vacation->save();

        return redirect()->route('vacation.history', ['id' => $request->personnel_id]);
    }

    public function destroy(string $id)
    {


        $vacation = Vacation::find($id);

        $personnel = Personnel::find($vacation->personnel->id);

        $personnel->entitlement = $vacation->entitlement + $personnel->entitlement ;

        if($vacation->distance > 0)
        {
            $personnel->useddistance = $personnel->useddistance - 1 ;
        }

        $personnel->save();

        $vacation->delete();

        if($vacation)
        {
            return back()->with('success' , 'مرخصی با موفقیت حذف شد');
        }else {
            return back()->with('fail' , 'هنگام حذف مرخصی مشکلی پیش امد');
        }
    }
}
