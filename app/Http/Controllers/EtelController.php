<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etel;
use App\Models\Kategoria;
use App\Models\Hasznalt;
use App\Models\Hozzavalo;

class EtelController extends Controller
{
    public function etelek()
    {
        $etelek = Etel::with('hozzavalok')->get();
        return view('etelek.index', compact('etelek'));
    }


    public function index()
    {
        
        $kategoriaRecept = Kategoria::with(['etelek' => function($query) {
            $query->inRandomOrder()->limit(1);
        }])->get();
    
        return view('frontend.home', compact('kategoriaRecept'));
    }

    public function store(Request $request)
    {
        $etel = new Etel();
        $etel->nev = $request->nev;
        $etel->kategoriaid = $request->kategoriaid;
        $etel->user_id = auth()->id();

   
        if ($request->hasFile('kep')) {
            $file = $request->file('kep');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/etelek', $filename);
            $etel->kep = $filename;
        } else {
            $etel->kep = null;
        }
    
        $etel->save();
    
        return redirect()->route('etelek')->with('success', 'Étel hozzáadva!');
    }
    

    public function show($id)
{
    $etel = Etel::with(['kategoria', 'hozzavalok'])->findOrFail($id);

    $masEtelek = Etel::where('kategoriaid', $etel->kategoriaid)
                      ->where('id', '<>', $etel->id)
                      ->inRandomOrder()
                      ->limit(3)
                      ->get();

    return view('frontend.etel_show', compact('etel', 'masEtelek'));
}


public function create()
{
    $kategoriak = Kategoria::all();
    $hozzavalok = Hozzavalo::all();

    return view('etelek.create', compact('kategoriak', 'hozzavalok'));
}


public function storeNew(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'kategoriaid' => 'required|exists:kategoria,id',
            'hozzavalo' => 'required|array',
            'hozzavalo.*' => 'required|string',
            'mennyiseg' => 'required|array',
            'mennyiseg.*' => 'required|numeric',
            'egyseg' => 'required|array',
            'egyseg.*' => 'nullable|string',
        ]);

        $etel = Etel::create([
            'nev' => $request->nev,
            'kep' => null,
            'kategoriaid' => $request->kategoriaid,
            'user_id' => auth()->id(),
        ]);
        
        for ($i = 0; $i < count($request->hozzavalo); $i++) {
            $hozzavalo = Hozzavalo::firstOrCreate(['nev' => $request->hozzavalo[$i]]);
            
            Hasznalt::create([
                'etelid' => $etel->id,
                'hozzavaloid' => $hozzavalo->id,
                'mennyiseg' => $request->mennyiseg[$i],
                'egyseg' => $request->egyseg[$i] ?? null,
            ]);
        }
        return redirect()->route('etelek.create')->with('success', 'Recept sikeresen feltöltve!');
    }


    public function sajatReceptjeim()
    {
        $etelek = Etel::where('user_id', auth()->id())
                      ->with('hozzavalok')
                      ->latest()     
                      ->paginate(6);  
    
        return view('etelek.sajat', compact('etelek'));
    }

public function destroy($id)
{
    $etel = Etel::findOrFail($id);
    
    if($etel->user_id != auth()->id()) {
        abort(403);
    }

    $etel->delete();
    return redirect()->route('etelek.sajat')->with('success', 'Recept törölve!');
}


public function edit($id)
{
    $etel = Etel::where('user_id', auth()->id())->findOrFail($id); // csak a saját recept
    $kategoriak = Kategoria::all();
    $hozzavalok = Hozzavalo::all();

    return view('etelek.create', compact('etel', 'kategoriak', 'hozzavalok'));
}

public function update(Request $request, $id)
{
    $etel = Etel::where('user_id', auth()->id())->findOrFail($id);

    $request->validate([
        'nev' => 'required|string|max:255',
        'kategoriaid' => 'required|exists:kategoria,id',
        'hozzavalo' => 'required|array',
        'hozzavalo.*' => 'required|string',
        'mennyiseg' => 'required|array',
        'mennyiseg.*' => 'required|numeric',
        'egyseg' => 'required|array',
        'egyseg.*' => 'nullable|string',
    ]);

    $etel->update([
        'nev' => $request->nev,
        'kategoriaid' => $request->kategoriaid,
    ]);


    $etel->hozzavalok()->detach();
    for ($i = 0; $i < count($request->hozzavalo); $i++) {
        $hozzavalo = Hozzavalo::firstOrCreate(['nev' => $request->hozzavalo[$i]]);
        Hasznalt::create([
            'etelid' => $etel->id,
            'hozzavaloid' => $hozzavalo->id,
            'mennyiseg' => $request->mennyiseg[$i],
            'egyseg' => $request->egyseg[$i] ?? null,
        ]);
    }

    return redirect()->route('etelek.sajat')->with('success', 'Recept sikeresen frissítve!');
}


}