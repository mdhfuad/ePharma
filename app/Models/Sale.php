<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_amount', 'paid_amount',
    ];

    public function items()
    {
        return $this->hasMany(SaleItem::class);
    }
}
