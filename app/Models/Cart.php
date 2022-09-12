<?php

namespace App\Models;

use App\Models\CartOpen;
use App\Models\LevelTwo;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    public function product_categories()
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function level_two()
    {
        return $this->hasOne(LevelTwo::class);
    }

    public function cart_opens()
    {
        return $this->hasMany(CartOpen::class);
    }
}