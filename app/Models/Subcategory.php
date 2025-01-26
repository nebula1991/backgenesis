<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','category_id'
      ];

      public function categories()
      {
        return $this->belongsTo(Category::class, 'category_id');
      }

         /**
     * Relación con los productos.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
