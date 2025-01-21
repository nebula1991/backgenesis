<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


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
    
    
    // Validation rules for this model
    static $rules = [
		'name' => 'required|min:5|max:30',
		'description' => 'required|min:5',
    'image' => 'mimes:jpeg,jpg,png|max:10240',
		'category_id' => 'required|integer',
    
  ];
    
    // Number of items to be shown per page
    protected $perPage = 20;

    // Attributes that should be mass-assignable
    protected $fillable = ['name','description','image','category_id'];
    
    // Attributes that are searchable
    static $searchable = ['name','description','image','category_id'];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id', 'category_id');
    }
    
}
