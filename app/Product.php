<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name', 'description','short_description','pattern','material','size'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function packages(){
        return $this->belongsToMany(Package::class);
    }
}
