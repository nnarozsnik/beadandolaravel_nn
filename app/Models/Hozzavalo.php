<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hozzavalo extends Model
{
    use HasFactory;

    protected $table = 'hozzavalo';

    protected $fillable = ['nev'];

    public $timestamps = false;
}