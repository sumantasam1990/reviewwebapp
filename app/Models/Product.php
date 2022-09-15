<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    use HasFactory;

    public function getSearchResult(): SearchResult
     {
        $url = $this->id;

         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->prod_title,
            $url
         );
    }

    public function product_categories()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function product_images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function product_image()
    {
        return $this->hasOne(ProductImage::class);
    }
}
