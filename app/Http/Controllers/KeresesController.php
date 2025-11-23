<?php

namespace App\Http\Controllers;

use App\Models\Etel;
use App\Models\Hozzavalo;
use App\Models\Kategoria;
use Illuminate\Http\Request;

class KeresesController extends Controller
{
    public function index(Request $request)
    {
        $q = $request->input('q');       
        $hozzavalok = $request->input('hozzavalo', []);
    
        $etelek = Etel::query()
        ->when($q, function ($query, $q) {
            $query->where('nev', 'LIKE', "%{$q}%");
        })
        ->when(!empty(array_filter($hozzavalok)), function ($query) use ($hozzavalok) {
            foreach ($hozzavalok as $h) {
                if (!empty($h)) { 
                    $query->whereHas('hozzavalok', function ($q2) use ($h) {
                        $q2->where('nev', '=', $h);
                    });
                }
            }
        })
            ->paginate(18)
            ->withQueryString();
    
        $allHozzavalok = Hozzavalo::all();
    
        return view('kereses.index', [
            'etelek' => $etelek,
            'hozzavalok' => $allHozzavalok
        ]);
    }
}