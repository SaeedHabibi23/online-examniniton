<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\categories;
use Illuminate\Support\Facades\Crypt;
use App\imports\QuestionImport;
use Maatwebsite\Excel\Facades\Excel;

class QuestionController extends Controller
{
    public function showquestion(){
        $Questions = Questions::join('categories' , 'categories.cat_id' , 'questions.cat_id')->paginate(60);
        return view('dashboards.admins.Questions.showQuestions' , compact('Questions'));
    }
    public function savequestion(Request $request){
        $categories = categories::all();

        return view('dashboards.admins.Questions.addQuestions' , compact('categories'));

    }
    public function storequestions(Request $request){
        $request->validate([
            'question' => 'required',
            'answertwo' => 'required',
            'answerthree' => 'required',
            'answerforth' => 'required',
            'answerone' => 'required',
        ],[
            'question.required' => 'سوال ضروری است',
            'answerone.required' => ' جواب اول ضروری است',
            'answertwo.required' => ' جواب دوم ضروری است',
            'answerthree.required' => 'جواب سوم ضروری است',
            'answerforth.required' => ' جواب چهارم ضروری است',
        ]);
        // return "Hello";

        $question = new Questions();
        $question->question = request('question');
        $question->answerone = request('answerone');
        $question->answertow = request('answertwo');
        $question->cat_id = request('cat_name');
        $question->answerthree = request('answerthree');
        $question->answerfour = request('answerforth');
        $question->finalanswer = request('finalanswer');
        $question->save();
        return redirect()->back()->with('status' , 'Question Saved Successfully');
    }
    public function editquestion($question_id){
        $decrypted = Crypt::decryptString($question_id);
        $questionsedit = Questions::findorFail($decrypted);

        $categories = categories::all();

        $data = [
            'questionsedit' => $questionsedit ,
            'categories' => $categories
        ];
        
        return view('dashboards.admins.Questions.editQuestions' , compact('data'));

    }

    public function storeeditquestion(Request $request){
        $categori = $request->categori;
        $questions = $request->question;
        $answerone = $request->answerone;
        $answertow = $request->answertwo;
        $answerthree = $request->answerthree;
        $answerfour = $request->answerforth;
        $finalanswer = $request->finalanswer;
       
        $question = Questions::find($request->question_id);
       
        $question->cat_id = $categori;
        

        $question->question = $questions;
        
        $question->answerone = $answerone;
        $question->answertow = $answertow;
        $question->answerthree = $answerthree;
        $question->answerfour = $answerfour;
        $question->finalanswer = $finalanswer;
        $question->save();
        return redirect()->back()->with('status' , 'Question Update Successfully Done!');
    
    }


    public function deletequestion($question_id){
        $decrypted = Crypt::decryptString($question_id);
        $question = Questions::where('question_id' , '=' ,$decrypted)->first();
        $question->delete();
        return redirect()->back()->with('status' , 'Question Deleted Successfully Done!');
    
    }
    public function importviafile(){
        return view('dashboards.admins.Questions.importviafile');

    }
    public function saveviafile(){
        Excel::Import(new QuestionImport , request()->file('file'));
        return redirect()->back();
    }

}
