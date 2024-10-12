<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Languages;
use App\Models\Menus;
class AdminController extends Controller
{

    public function dashboard(){
      return view('admin.dashboard');
    }
    public function languages(){
      return view('admin.languages');
    }
    public function addLanguages(Request $request){
      $languages = new Languages();
      $languages->name = $request->name;
      $languages->title = $request->title;
      $languages->save();
      return redirect('/admin/edit/languages')->with('success','Ugurla Elave Olundu');
    }
    public function editLanguages($id){
        $language = Languages::find($id);
        return view('admin.editlanguage',['language'=> $language]);
    }
    public function editingLanguages(Request $request){
      $languages = Languages::find($request->id);
      $languages->name = $request->name;
      $languages->title = $request->title;
      $languages->save();
      return redirect('/admin/edit/languages')->with('success','Ugurla Deyistirildi');
    }

    public function deleteLanguages($id){
      Languages::find($id)->delete();
      return redirect('/admin/edit/languages')->with('success','Ugurla Silindi');
    }


   
    public function login(){
      return view('admin.login');
    }
    public function blogs(){
      $blogs = DB::table('blogs')->get();
      return view('admin.blogs',['blogs'=>$blogs]);
    }
    public function edit(){
      return view('admin.edit');
    }
}
