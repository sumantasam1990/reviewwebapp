<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cart;
use App\Models\SaveCart;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class User extends Authenticatable implements Searchable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    public function getSearchResult(): SearchResult
     {
        $url = $this->id;

         return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
         );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function save_cart_many_single()
    {
        return $this->belongsToMany(Cart::class)->withPivot('type', 'created_at')->wherePivot('type', '=', 'single');
    }

    public function save_cart_many_multi()
    {
        return $this->belongsToMany(Cart::class)->withPivot('type', 'created_at')->wherePivot('type', '=', 'multi');
    }
}