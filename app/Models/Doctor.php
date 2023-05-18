<?php

namespace App\Models;

use App\Enums\DoctorSpecialty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'specialty', 'email', 'no_phone', 'room', 'user_id'];

    protected $cast = [
        'specialty' => DoctorSpecialty::class,
    ];

    public function user()
    {
       return $this->hasOne(User::class,);
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
}
