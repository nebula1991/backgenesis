<?php

namespace App\Models;

use App\Models\Event;
use App\Models\Category;
use App\Models\RateProduct;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


/**
 * Class Product
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $image
 * @property $category_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Category $category
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Product extends Model
{
    
    use HasFactory;
    
    // Number of items to be shown per page
    protected $perPage = 20;

    // Attributes that should be mass-assignable
    protected $fillable = ['name','description','price','stock','image','category_id','subcategory_id'];
    
    // Attributes that are searchable
    static $searchable = ['name','description','price','stock','image','category_id','subcategory_id'];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function rateProducts()
    {
    return $this->hasMany(RateProduct::class);
    } 

    public function Events()
    {
    return $this->hasMany(Event::class);
    } 

    // Método para obtener el precio actual basado en la temporada
    public function seasons()
    {
        $today = now();
        $rateProduct = $this->rateProducts()
            ->where('start_date', '<=', $today)
            ->where('end_date', '>=', $today)
            ->first();

        return $rateProduct ? $rateProduct->price : $this->price; // Precio estacional o el precio base
    }



    
}
