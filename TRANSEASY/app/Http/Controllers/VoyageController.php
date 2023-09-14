<?php

namespace App\Http\Controllers;
use App\Models\Place ;

use App\Models\Voyage;
// use App\Models\Bus;
use Illuminate\Http\Request;
// use App\Http\Middleware\Authenticate;
use Carbon\Carbon;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Voyage::all();
        return view('admin.showAll', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = [
            "Casablanca",
            "Rabat",
            "Marrakesh",
            "Fes",
            "Tangier",
            "Salé",
            "Meknes",
            "Agadir",
            "Oujda",
            "Kenitra",
            "Tetouan",
            "Temara",
            "Safi",
            "Mohammedia",
            "Khouribga",
            "El Jadida",
            "Beni Mellal",
            "Aït Melloul",
            "Nador",
            "Taza",
            "Khémisset",
            "Béni Khiar",
            "Fkih Ben Salah",
            "Taourirt",
            "Tiznit",
            "Oued Zem",
            "Sidi Slimane",
            "Sidi Kacem",
            "Essaouira",
            "Tan-Tan"
        ];
        return view('admin.formToCreate', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $date = Carbon::parse($request->date_depart);
        $time = Carbon::parse($request->heure_depart);
        $formattedTime = $time->format('H:i');
        
        Voyage::create([
            'depart' => $request->depart,
            'destination' => $request->destination,
            'seatsavb' => $request->seatsavb,
            'date_depart' => $date,
            'heure_depart' => $formattedTime,
            'price' => $request->price
        ]);

        return view('admin.done');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = Voyage::where('depart', $request->depart)
            ->where('destination', $request->destination)
            ->where('date_depart', $request->date_depart)
            ->get();
        return view('ineractWithUser.showVoyages', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
        public function edit(Voyage $voyage)
    {
        return view('admin.editForm', compact('voyage'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voyage $voyage)
    {
        $voyage->update($request->all());
        return redirect()->route('voyage.index')->with('update', 'Voyage updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
        public function destroy($id)
    {
        // return 'dhgd' ;
        $voyage = Voyage::findOrFail($id);
        $places = Place::where('voyage_id',$id) ;
        $places ->delete() ;
        $voyage->delete();
        // Voyage::destroy($id) ;
        return redirect()->route('voyage.index')->with('success', 'Voyage deleted successfully.');
    }
}
