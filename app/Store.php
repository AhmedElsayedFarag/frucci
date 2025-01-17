<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name', 'address','working_times'];
    protected $fillable = array('city_id');

    public function city(){
        return $this->belongsTo(City::class);
    }
}
