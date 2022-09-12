<?php

namespace App\Models;

use App\Models\ProductImage;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

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
