<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    /**
     * Get the test that owns the parameter.
     */
    public function tests()
    {
        return $this->belongsTo(Test::class);
    }
    public function packages()
    {
        return $this->belongsTo(Package::class);
    }
    // Mutator to store parameters as JSON
    public function setParametersAttribute($value)
    {
        $this->attributes['parameters'] = json_encode($value);
    }

    // Accessor to retrieve parameters as array
    public function getParametersAttribute($value)
    {
        return json_decode($value, true);
    }
}
