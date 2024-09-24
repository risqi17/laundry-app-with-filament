<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'laundry_service_id',
        'city_id',
        'quantity',
        'total_price',
    ];

    public function laundryService()
    {
        return $this->belongsTo(LaundryService::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
