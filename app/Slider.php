<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    Use Translatable;
    public $translatedAttributes = ['head', 'link_title'];
    protected $fillable = array('image');
}
