<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = ('questions');
    protected $primaryKey = 'question_id';

    protected $fillable = [
        'question_id' ,
        'question' ,
        'answerone' ,
        'answertow' ,
        'answerthree' ,
        'answerfour' ,
        'finalanswer' ,
        'cat_id' 
    ];
}
