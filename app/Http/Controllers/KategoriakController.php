<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategoria;

class KategoriakController extends Controller
{
    public function show($id)
    {
        $kategoria = Kategoria::findOrFail($id);
        $etelek = $kategoria->etelek()->paginate(9); 
    
        return view('frontend.kategoria_show', compact('kategoria', 'etelek'));
    }
}