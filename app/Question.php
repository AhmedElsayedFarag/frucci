<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    Use Translatable;
    public $translatedAttributes = ['question', 'answer'];
    protected $fillable = array('question', 'answer');

}
