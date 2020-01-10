<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name'];
}
