<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['email', 'token', 'created_at'];
    protected $primaryKey = 'email'; // Specify the primary key if it's not 'id'
    public $incrementing = false; // Set to false if the primary key is not an incrementing integer
}
