<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    protected $fillable = [
        'id',
        'name'
    ];

    // for join table with Product  
    public function product() 
    { 
        return $this->hasMany(Product::class); 
    }
}
