<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etel;

class EtelController extends Controller
{
    public function index()
    {
        $etelek = Etel::with('hozzavalok')->get();
        return view('etelek.index', compact('etelek'));
    }
}