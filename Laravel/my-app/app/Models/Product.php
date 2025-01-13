<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'detail',
        'price',
        'image'
        ];

    // join table with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // join table with Review
    public function review()
    {
        return $this->hasMany(Review::class);
    }

}
