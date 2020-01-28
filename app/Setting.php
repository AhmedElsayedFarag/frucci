<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    Use Translatable;
    public $translatedAttributes = ['name', 'value'];

}
