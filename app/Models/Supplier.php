<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;


    protected $fillable = [
        'name','email','address','phone'
      ];

      static $searchable = [
        'name','email','address','phone'
      ];

      public function Events()
      {
      return $this->hasMany(Event::class);
      } 
  
      
}
