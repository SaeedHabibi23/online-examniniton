<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = ('answers');
    protected $primaryKey = 'answer_id';

    protected $fillable = [
        'answer_id' , 
        'choiceanswer' , 
        'correctanswer' , 
        'question_id' , 
        'id'  
    ];
}
