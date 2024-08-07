<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public function packageBooking()
    {
        return $this->hasMany(PackageBooking::class);
    }
    public function tests()
    {
        return $this->hasMany(Test::class, 'id');
    }
    public function parameter()
    {
        return $this->belongsToMany(Parameter::class)->withPivot('parameters');
    }
}
