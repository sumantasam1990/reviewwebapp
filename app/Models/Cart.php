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

    public function product_categories(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ProductCategory::class);
    }

    public function level_two(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(LevelTwo::class);
    }

    public function cart_opens(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CartOpen::class);
    }
}
