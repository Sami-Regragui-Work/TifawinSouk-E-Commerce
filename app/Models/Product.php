<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'reference', 'short_description', 'price', 'stock', 'image_url', 'category_id'];

    public function category() 
    {
        return $this->belongsTo(Category::class);
    }
}
