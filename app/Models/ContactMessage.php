<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['user_id','name', 'email', 'phone', 'message'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

}
