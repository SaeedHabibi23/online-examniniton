<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\categories;

class UserController extends Controller
{
    public function index(){
        return view('dashboards.users.index');
    }
    public function settings(){
        return view('dashboards.users.settings');
    }
    public function exammode(){
        return view('dashboards.users.exammode');
    }
    public function startexam(){
        $Questions = Questions::join('categories' , 'categories.cat_id' , 'questions.cat_id')->inRandomOrder()
        ->limit(1)
        ->get();

        $categories = categories::where('cat_id' , '=' , '5')->first();

        $data = [
            'Questions' => $Questions ,
            'categories' => $categories
        ];

        return view('dashboards.users.startexam' , compact('data'));
    }
}
