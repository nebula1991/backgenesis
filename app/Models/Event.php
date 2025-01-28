<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['units', 'unit_price', 'start_date', 'end_date'];

    public function Products()
    {
    return $this->belongsTo(Product::class);
    } 

}
