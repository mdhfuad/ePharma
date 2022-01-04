<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'website', 'logo', 'user_id'
    ];


    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function pharmacist()
    {
        return $this->belongsTo(User::class, 'user_id')->where('role', 'pharmacist');
    }
}
