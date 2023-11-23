<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\categories;
use Illuminate\Support\Facades\Crypt;
use App\Models\Answer;
use App\Models\Result;

class UserController extends Controller
{
    public function index(){
        return view('dashboards.users.index');
    }
    public function settings(){
        return view('dashboards.users.settings');
    }
    public function exammode(){
        $categories = categories::all();
        return view('dashboards.users.exammode' , compact('categories'));
    }
    public function startexam(Request $request){
        $cat_id = $request->cat_id;
        // return $cat_id;
        $Questions = Questions::join('categories' , 'categories.cat_id' , 'questions.cat_id')
        ->orderBy('question_id')
        ->first();

        $categories = categories::where('cat_id' , '=' , $cat_id)->first();

        $data = [
            'Questions' => $Questions ,
            'categories' => $categories
        ];

        return view('dashboards.users.startexam' , compact('data'));
    }
    public function nextquestion(Request $request, $question_id){
        // return $request->valueone;
   
        
    $decrypted = Crypt::decryptString($question_id);

     $answerpre = Answer::join('users' , 'users.id' , 'answers.id')
     ->join('questions' , 'questions.question_id' , 'answers.question_id')
     ->where('answers.question_id' , '=' , $decrypted)
     ->where('answers.id' , '=' , auth()->user()->id)->first();

     if($answerpre){
        // return redirect()->back()->with('status' , 'You answered This Question');
     }else{
        $request->validate([
            'valueone'=> "required" , 
         ]);
    $Questionsanswer = Questions::join('categories', 'categories.cat_id', 'questions.cat_id')
    ->where('questions.question_id', '=', $decrypted)
    ->first();
    $Answer = new Answer();
    $Answer->choiceanswer = $request->valueone;
    $Answer->correctanswer = $Questionsanswer->finalanswer;
    $Answer->question_id = $Questionsanswer->question_id;
    $Answer->id = auth()->user()->id;
    $Answer->save();
     }

    $id =  $decrypted + 1;
    $foundQuestion = false;

while (!$foundQuestion) {
    $Questions = Questions::join('categories', 'categories.cat_id', 'questions.cat_id')
        ->where('questions.question_id', '=', $id)
        ->first();

        $Questionslaset_id = Questions::join('categories', 'categories.cat_id', 'questions.cat_id')
        ->orderBy('question_id', 'DESC')
        ->first();

    if ($Questions) {
        $foundQuestion = true;
    } else {
        $id++; // اگر رکوردی با این آیدی وجود نداشت، آیدی را یک واحد افزایش دهید و دوباره جستجو کنید
    }

    // اگر آیدی به حداکثر مقدار ممکن رسیده باشد، معنی آن این است که تمام سوالات پاسخ داده شده‌اند
    if ($id > $Questionslaset_id->question_id) {
        return view('dashboards.users.checkresult'); 
    }
}

// اگر یک سوال پیدا شد، ادامه عملیات و پر شدن متغیرها و بازگرداندن نمایش به ویو را انجام دهید
if ($foundQuestion) {
    $categories = categories::where('cat_id', '=', $Questions->cat_id)->first();

    $data = [
        'Questions' => $Questions,
        'categories' => $categories
    ];

    return view('dashboards.users.startexam', compact('data'));
} else {
    // در صورت عدم وجود سوالات بیشتر، عملیات دیگری انجام دهید، مثلاً نمایش پیام خاتمه
    // return view('dashboards.users.allQuestionsAnswered');
   return "Noerror";
}
    }















    public function previousquestion($question_id){
        $decrypted = Crypt::decryptString($question_id);
        
$id =  $decrypted - 1;
$foundQuestion = false;

while (!$foundQuestion) {
    $Questions = Questions::join('categories', 'categories.cat_id', 'questions.cat_id')
        ->where('questions.question_id', '=', $id)
        ->first();

        $Questionslaset_id = Questions::join('categories', 'categories.cat_id', 'questions.cat_id')
        ->orderBy('question_id')
        ->first();

    if ($Questions) {
        $foundQuestion = true;
    } else {
        $id--; // اگر رکوردی با این آیدی وجود نداشت، آیدی را یک واحد افزایش دهید و دوباره جستجو کنید
    }

    // اگر آیدی به حداکثر مقدار ممکن رسیده باشد، معنی آن این است که تمام سوالات پاسخ داده شده‌اند
    if ($id < $Questionslaset_id->question_id) {
        return "No Prevous Question!!!!!!!!!!!!!!!!!!!!!!!!!";
    }
}

// اگر یک سوال پیدا شد، ادامه عملیات و پر شدن متغیرها و بازگرداندن نمایش به ویو را انجام دهید
if ($foundQuestion) {
    $categories = categories::where('cat_id', '=', $Questions->cat_id)->first();

    $data = [
        'Questions' => $Questions,
        'categories' => $categories , 
    ];

    return view('dashboards.users.startexam', compact('data'));
} else {
    // در صورت عدم وجود سوالات بیشتر، عملیات دیگری انجام دهید، مثلاً نمایش پیام خاتمه
    // return view('dashboards.users.allQuestionsAnswered');
   return "Noerror";
}


    }
























    public function checkresult(){
      
        $answerpre = Answer::join('users', 'users.id', '=', 'answers.id')
        ->join('questions', 'questions.question_id', '=', 'answers.question_id')
        ->select('answers.choiceanswer', 'answers.correctanswer')
        ->where('answers.id', auth()->user()->id)
        ->get();

        $correctCount = 0;
        $incorrectCount = 0;

        foreach ($answerpre as $answer) {
            if ($answer->choiceanswer == $answer->correctanswer) {
                $correctCount++;
            } else {
                $incorrectCount++;
            }
        }
        // return $incorrectCount;

        $Result = new Result();
        $Result->correctanswer = $correctCount;
        $Result->incorrectanswer = $incorrectCount;
        $Result->id = auth()->user()->id;
        $Result->save();

        $Result = Result::join('users' , 'users.id' , 'results.id')
        ->where('results.id' , '=' , auth()->user()->id)->first();

        return view('dashboards.users.checkresultcom' , compact('Result'));
    }

}