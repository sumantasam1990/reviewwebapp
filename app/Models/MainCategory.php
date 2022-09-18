<?php

namespace App\Models;

use App\Models\LevelOne;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MainCategory extends Model
{
    use HasFactory;

    public function level_ones()
    {
        return $this->hasMany(LevelOne::class);
    }
}