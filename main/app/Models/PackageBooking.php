<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBooking extends Model
{
    use HasFactory;
    protected $table = 'package_bookings';
    protected $fillable = [
        'package_id',
        'user_id',
        'booking_date',
        'slot',
        'status',
    ];
}
