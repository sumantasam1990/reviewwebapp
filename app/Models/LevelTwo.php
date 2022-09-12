<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\CartOpen;
use App\Models\LevelOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LevelTwo extends Model
{
    use HasFactory;

    public function level_one()
    {
        return $this->belongsTo(LevelOne::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function allCarts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cart_opens()
    {
        return $this->hasManyThrough(CartOpen::class, Cart::class);
    }
}
