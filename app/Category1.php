<?php

namespace App;
use App\Product;

use Illuminate\Database\Eloquent\Model;

class Category1 extends Model
{
    protected $fillable=['categories'];

    public function products()
    {
       return $this->hasMany(Product::class);
    }
    
}
