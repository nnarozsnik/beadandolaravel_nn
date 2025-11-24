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


   
public function kategoria()
{
    return $this->belongsTo(Kategoria::class, 'kategoriaid', 'id');
}


public function getKepUrlAttribute()
{
    if ($this->kep && file_exists(storage_path('app/public/etelek/' . $this->kep))) {
        return asset('storage/etelek/' . $this->kep);
    }

    return asset('images/default_etel.png');
}



protected $fillable = ['nev', 'kategoriaid', 'kep', 'user_id' ];



}