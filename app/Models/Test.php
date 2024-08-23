<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
    ];

    public function testBooking()
    {
        return $this->hasMany(TestBooking::class);
    }
    public function packages()
    {
        return $this->belongsTo(Package::class);
    }
    public function parameters()
    {
        return $this->belongsToMany(Parameter::class)->withPivot('parameters');
    }
    public function categories()
    {
        return $this->belongsToMany(Parameter::class)->withPivot('categories');
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
}