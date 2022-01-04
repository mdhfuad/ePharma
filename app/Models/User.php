<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name', 'email', 'password', 'role', 'phone'
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function scopePharmacist($query)
    {
        return $query->where('role', 'pharmacist');
    }

    public function scopeManagers($query)
    {
        return $query->where('role', 'manager');
    }

    public static function roles()
    {
        return [
            'admin',
            'manager',
            'pharmacist',
        ];
    }

    public function htmlRole()
    {
        return match ($this->role) {
            'admin' => '<span class="badge bg-green">Admin</span>',
            'manager' => '<span class="badge bg-purple">Manager</span>',
            'pharmacist' => '<span class="badge bg-azure">Pharmacist</span>',
        };
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function company()
    {
        return $this->hasOne(Company::class);
    }
}
