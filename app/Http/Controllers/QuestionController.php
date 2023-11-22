<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
class QuestionController extends Controller
{
    public function showquestion(){
        $Questions = Questions::paginate(60);
        return view('dashboards.admins.Questions.showQuestions' , compact('Questions'));


    }
}
