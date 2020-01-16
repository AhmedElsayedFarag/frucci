<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name'];

    public function country()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id');
    }
}
