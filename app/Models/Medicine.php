<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'weight', 'unit_price', 'company_id', 'generic_id', 'dosage_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function generic()
    {
        return $this->belongsTo(Generic::class);
    }

    public function dosage()
    {
        return $this->belongsTo(Dosage::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
