<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionTranslation extends Model
{
    protected $fillable = array('question', 'answer');
}
