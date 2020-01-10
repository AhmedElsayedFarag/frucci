<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name'];
}
