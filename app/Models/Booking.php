<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table='bookings';
    protected $fillable=[
       'user_id',
       'car_id',
       'total_days',
       'total_km',
       'amount_to_pay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}
