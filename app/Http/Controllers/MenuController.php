<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menus;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menus::orderBy('order','ASC')->get();
        return view('admin.menus', compact('menus'));
    }
    public function addMenus(Request $request){

      $menus = new Menus();
      $menus->menu_title = json_encode($request->title);
      $has=  Menus::where('menu_url', str()->slug(json_decode($menus->menu_title, true)['en']))->first();
      $menus->menu_url = !$has?str()->slug(json_decode($menus->menu_title, true)['en']):str()->slug(json_decode($menus->menu_title, true)['en']).'-'.rand(1,100);
      $menus->order = 0;
      $menus->active = 1;
      $menus->save();
      return redirect('/admin/edit/menus')->with('success','Ugurla Elave Olundu');
    }
    public function editingmenu(Request $request){
      $menus = Menus::find($request->id);
      $menus->menu_title = json_encode($request->title);
      $menus->menu_url = str()->slug(json_decode($menus->menu_title, true)['en']);
      $menus->save();
      return redirect('/admin/edit/menus')->with('success','Ugurla Deyistirildi');
    }
    public function editMenu($id){
      $menu = Menus::find($id);
      return view('admin.editmenu',['menu'=> $menu]);
  }
    public function deleteMenu($id){
      Menus::find($id)->delete();
      return redirect('/admin/edit/menus')->with('success','Ugurla Silindi');
    }

    public function reorder(Request $request)
    {
        $menus = Menus::all();

        foreach ($menus as $menu) {

            foreach ($request->order as $order) {

                if ($order['id'] == $menu->id) {

                    $menu->update(['order' => $order['position']]);
                }
            }
        }

        return response(['message' => 'Update Successfully'], 200);
    }
}
