<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['fullname', 'email', 'no_phone', 'doctor_id', 'date', 'message', 'user_id', 'status'];


    public function user()
    {
       return $this->hasOne('App\Models\User');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
}
