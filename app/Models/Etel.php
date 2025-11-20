<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etel extends Model
{
    use HasFactory;

    protected $table = 'etel';

    public function hozzavalok()
    {
        return $this->belongsToMany(Hozzavalo::class, 'hasznalt', 'etelid', 'hozzavaloid')
                    ->withPivot('mennyiseg', 'egyseg');
    }
}