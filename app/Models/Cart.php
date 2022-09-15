<?php

namespace App\Models;

use App\Models\User;
use App\Models\CartOpen;
use App\Models\LevelTwo;
use App\Models\SaveCart;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Cart extends Model implements Searchable
{
    use HasFactory;

    public function getSearchResult(): SearchResult
     {
        $url = $this->id;

         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->cart_name,
            $url
         );
    }

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
