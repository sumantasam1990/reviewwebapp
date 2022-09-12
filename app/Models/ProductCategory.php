<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    public function carts()
    {
        return $this->belongsTo(Cart::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
