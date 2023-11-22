<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('dashboards.users.index');
    }
    public function settings(){
        return view('dashboards.users.settings');
    }
}
