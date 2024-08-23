<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function admin()
    {
        return $this->hasOne(Admin::class);

    }
    public function patient()
    {
        return $this->hasOne(Patient::class);

    }
    public function packageBooking()
    {
        return $this->hasMany(PackageBooking::class);
    }
    public function testBooking()
    {
        return $this->hasMany(TestBooking::class);
    }
    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }
    public function cart()
    {
        return $this->hasMany(Cart::class);
    }
}
