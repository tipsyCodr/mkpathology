<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    protected $fillable = ['cart_id', 'test_id', 'package_id', 'type', 'quantity'];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
