<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etel;
use App\Models\Kategoria;

class AdminController extends Controller
{
    public function etelekDiagram()
    {
   
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

    
        $kategoriak = Kategoria::all();
        $labels = $kategoriak->pluck('nev');

   
        $data = [];
        foreach ($kategoriak as $kategoria) {
            $data[] = Etel::where('kategoriaid', $kategoria->id)->count();
        }

        return view('admin.etelek_diagram', compact('labels', 'data'));
    }
}