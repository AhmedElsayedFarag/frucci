<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = array('value', 'expire_date', 'number_of_users', 'state', 'brand_id', 'type', 'option', 'coupon');

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
