<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'id',
        'name'
    ];

    // join table with Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
