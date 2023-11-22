<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\Crypt;


class categoriController extends Controller
{
    public function showcategori(){
        $categories = categories::all();
        return view('dashboards.admins.categories.showcategories' , compact('categories'));
    }

    public function addcategori(){
        return view('dashboards.admins.categories.addcategories');
    }

    public function savecategory(Request $request){
        $request->validate([
            'cat_name' => 'required',
            'Minutes' => 'required',
        ]);

        $categories = new categories();
        $categories->name = request('cat_name');
        $categories->timer = request('Minutes');
        $categories->save();
        return redirect()->back()->with('status' , 'Categori Added Successfuly');

    }

    public function editcategori($cat_id){
        $decrypted = Crypt::decryptString($cat_id);
        $categoriesedit = categories::where('cat_id' , '=' ,$decrypted)->first();
        return view('dashboards.admins.categories.editcategori' , compact('categoriesedit'));
    }

    public function storeeditcategori(Request $request){
        $name = $request->name;
        $timer = $request->timer;
        
        $categories = categories::where('cat_id' , '=' , $request->cat_id)->first();

        $categories->name = $name;
        $categories->timer = $timer;
        $categories->save();
        return redirect()->back()->with('status' , 'Categori Update Successfully Done!');
    
    }

    public function deletecategori($cat_id){
        $decrypted = Crypt::decryptString($cat_id);
        $categories = categories::where('cat_id' , '=' ,$decrypted)->first();
        $categories->delete();
        return redirect()->back()->with('status' , 'Categori Delete Successfully Done!');
    
    }
}
