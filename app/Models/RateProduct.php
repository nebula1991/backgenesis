<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RateProduct extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'price_rate',
        'start_date',
        'end_date',
        'product_id',
    ];

        // Relación con el modelo Product
        public function product()
        {
            return $this->belongsTo(Product::class);
        }
}
