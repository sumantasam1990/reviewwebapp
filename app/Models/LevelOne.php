<?php

namespace App\Models;

use App\Models\LevelTwo;
use App\Models\MainCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LevelOne extends Model
{
    use HasFactory;

    public function level_twos()
    {
        return $this->hasMany(LevelTwo::class);
    }

    public function main_category()
    {
        return $this->belongsTo(MainCategory::class);
    }
}
