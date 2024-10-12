<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function categories(){
    return view('admin.categories',['categories'=>Categories::all()]);
  }
  public function deleteCategory($id){
    Categories::find($id)->delete();
    return redirect('/admin/edit/categories')->with('success','Ugurla Silindi');
  }
  public function editCategory($id){
    $category = Categories::find($id);
        return view('admin.editcategory',['category'=> $category]);
  }
  public function updateCategory(Request $request){
    $category = Categories::find($request->id);
    $category->title = $request->title;
    $category->save();
    return redirect('/admin/edit/categories')->with('success','Ugurla Deyistirildi');
  }
  public function addCategory(Request $request){
    /* dd($request->title); */
/*       $languages = Languages::all();
    $translations = [];
    foreach ($languages as $key => $value) {
      $translations[$value->name] = $request->title[$value->name];
    }
    dd($translations); */
    Categories::create([
      'title' => $request->title ]);
    return redirect('/admin/edit/categories')->with('success','Ugurla Elave Olundu');
  }
}
