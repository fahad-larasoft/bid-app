<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function biddingProducts() {
        return $this->belongsToMany(Product::class, 'product_bid_pivot')
            ->withPivot('bidding_amount')
            ->withTimestamps();
    }

    public function isAlreadyAppliedToProduct(Product $product) {
        return in_array($product->id, $this->biddingProducts->pluck('id')->toArray());
    }

    public function getBiddingAmountOnProduct(Product $product) {
        $product = auth()->user()->biddingProducts()->where('products.id', $product->id)->first();
        if ($product) {
            return "$".$product->pivot->bidding_amount;
        } else {
            return null;
        }
    }
}
