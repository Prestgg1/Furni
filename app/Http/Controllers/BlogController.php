<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Languages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blogs;
class BlogController extends Controller
{
  public function index(){
    $blogs = Blogs::all();
    $categories = Categories::all();
    return view('front.blog', ['blogs' => $blogs, 'categories' => $categories]);
  }
  public function category($slug){
    $categories = Categories::all();
    $languages= Languages::all();
    $mycategory=null;
    foreach ($categories as $category) {
      if($category->getTranslations('slug')[app()->getLocale()]==$slug){
        $mycategory=$category;
        break;
      }
    }
    if(!$mycategory) return view('errors.404');
    $blogs = Blogs::where('category_id', $mycategory->id)->get();
    return view('front.blog', ['blogs' => $blogs, 'categories' => $categories,'mycategory'=>$mycategory]);
  }
  public function edit($id,Request $request){
    $categories = Categories::all();
    $blog = Blogs::all()->where('id',$id)->first();
    
    $lan =  !isset($request->query()['lan'])?'en':$request->query()['lan'];
    return view('admin.editblog', ['blog' => $blog, 'lan' => $lan, 'categories' => $categories]);
  }
  public function editingBlog(Request $request){
    $Blogs = Blogs::find($id);
    
    dd($request);
    $Blogs->title= $request->title;
    $Blogs->content= $request->content;
    $Blogs->category_id = $request->category_id;
    $Blogs->description=$request->description;
    $Blogs->save();
    return redirect('/admin/edit/blogs')->with('success', 'Ugurla Deyistirildi');
    
  }
  public function blogs(Request $request){
    $blogs = Blogs::all();
    $categories = Categories::all();
    $lan =  !isset(array_keys($request->query())[0])?'en':array_keys($request->query())[0]; ;
    return view('admin.blogs', ['blogs' => $blogs, 'categories' => $categories,'lan'=>$lan]);
  }
  public function details($slug){
    $locale =app()->getLocale();
    $blog =Blogs::whereRaw("JSON_EXTRACT(slug, '$.$locale') = '$slug'")->first();
    view()->share('slug', $slug);
    return view('front.blog_single', ['blog' => $blog]);
  }
  public function author($name){
    $user = User::where('name', $name)->first();
    $blog=Blogs::where('created_by', $name)->get();
    view()->share('slug', $name);
    return view('front.blog_author', ['blogs' => $blog,'user'=>$user]);
  }
  public function deleteBlog($id){
    DB::table('blogs')->where('id',$id)->delete();
    return redirect('/admin/edit/blogs')->with('success','Ugurla Silindi');
  }
  public function addBlogs(Request $request)
  {

      $Blogs = new Blogs();
      
    if ($request->hasFile('image')) {
      $ext = $request->file('image')->extension();
      $filename = rand(0, 100) . time() . '.' . $ext;
      $filenamewithUpload = 'storage/upload/' . $filename;
      $request->file('image')->storeAs('public/upload', $filename);
      $Blogs->thumbnail = $filenamewithUpload;
    }
    else{
      
    }
    $Blogs->category_id = $request->category_id;
    $Blogs->title= $request->title;
    $Blogs->content= $request->content;
    $Blogs->description=$request->description;
    $Blogs->save();
    return redirect('/admin/edit/blogs')->with('success', 'Ugurla Elave Olundu');
  }
}
