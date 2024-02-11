<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encouragement;
use App\Models\Personnel;

class EncouragementController extends Controller
{

    public function index()
    {
        $encouragements = Encouragement::with('personnel')->get();
        $encouragementsWithAllPersonnel = $encouragements->filter(function($encouragement) {
            return $encouragement->personnel->count() > 1;
        });
        
        return view('encouragement.index', compact('encouragementsWithAllPersonnel'));
    }

    public function show(string $id)
    {
        $encouragements = Personnel::find($id)->encouragements()->orderBy('id' , 'DESC')->get();;

        return view('personnel.encouragement' , compact('encouragements'));
    }
    public function create()
    {
        return view('encouragement.create');
    }
    public function store(Request $request)
    {
        $encouragement = Encouragement::create($request->only(['title', 'days']));

        $personnel = Personnel::where('personnel_code' , '=' , $request['personnel'])->first();

        //$personnelIds = $request->input('personnel', []);

        // Attach personnel to the encouragement
        $encouragement->personnel()->attach($personnel->id);

        return response()->json([
            'message' => 'مرخصی تشویقی با موفقیت اضافه شد',
        ]);
    }

    public function storeMany(Request $request)
    {
        $encouragement = Encouragement::create($request->only(['title', 'days']));

        $personnels = Personnel::all();

        // Attach personnel to the encouragement
        foreach ($personnels as $personnel)
        {
            $encouragement->personnel()->attach($personnel->id);
        }

        return response()->json([
            'message' => 'مرخصی تشویقی برای تمامی موفقیت اضافه شد',
        ]);
    }

    public function destroy(int $id)
    {
        // Detach personnel before deleting the encouragement
        $encouragement = Encouragement::find($id);

        $encouragement->personnel()->detach();
    
        // Delete the encouragement
        $encouragement->delete();
    
        // Return a JSON response with a success message
        return response()->json([
            'message' => 'مرخصی تشویقی با موفقیت حذف شد',
        ]);
    }  
}


// $encouragement = Encouragement::create($request->only(['title', 'days']));
// $personnelIds = $request->input('personnel', []);
// $encouragement->personnel()->attach($personnel->id);

// return response()->json([
//     'message' => 'مرخصی تشویقی با موفقیت اضافه شد',
// ]);