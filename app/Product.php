<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name', 'description','short_description','pattern','material','size'];
}
