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
    public function test()
    {
        return $this->belongsTo(Test::class, 'tests_ids', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'tests_ids', 'id');
    }
}
