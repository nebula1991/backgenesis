<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;



    protected $fillable = ['title','product_id','units','price', 'start', 'end'];

    public function Products()
    {
    return $this->belongsTo(Product::class);
    } 

}
