<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name', 'description'];
}
