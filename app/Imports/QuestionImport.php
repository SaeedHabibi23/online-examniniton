<?php

namespace App\Imports;

use App\Models\Questions;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Questions([
            'cat_id' => $row[0] , 
            'question' => $row[1] , 
            'answerone' => $row[2] ,
            'answertow' => $row[3] ,
            'answerthree' => $row[4] ,
            'answerfour' => $row[5] ,
            'finalanswer' => $row[6] ,
        ]);
    }
}
