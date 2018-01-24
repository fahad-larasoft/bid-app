<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'min_amount',
        'sellable_amount'
    ];

    public function biddingUsers() {
        return $this->belongsToMany(User::class, 'product_bid_pivot')
            ->withPivot('bidding_amount')
            ->withTimestamps();
    }

    public function getIsExpiredAttribute() {
        return Carbon::parse($this->end_date) < Carbon::now();
    }

    public function getIsStartedAttribute() {
        return Carbon::parse($this->start_date) <= Carbon::now();
    }
}
