<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [ 
        'category_id', 
        'name', 
        'detail', 
        'price', 
        'image' 
    ];

    // for join table with category  
    public function category() 
    { 
        return $this->belongsTo(Category::class); 
    }

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }   
}


