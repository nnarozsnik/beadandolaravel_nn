<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasznalt extends Model
{
    use HasFactory;

    protected $table = 'hasznalt';

    protected $fillable = [
        'etelid',
        'hozzavaloid',
        'mennyiseg',
        'egyseg',
    ];

    public $timestamps = false;
}