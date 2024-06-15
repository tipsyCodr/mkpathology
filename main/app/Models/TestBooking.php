<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestBooking extends Model
{
    use HasFactory;

    protected $table = 'test_bookings';
    protected $fillable = [
        'tests_ids',
        'user_id',
        'booking_date',
        'slot',
        'status',
    ];

}
