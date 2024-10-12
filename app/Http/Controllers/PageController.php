<?php

namespace App\Http\Controllers;
use App\Http\Requests\ElaqeRequest;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Menus;
use Mail;
class PageController extends Controller
{
  public function home()
  {
    $blogs = Blogs::orderBy('created_at')->limit(3)->get();
    
    return view('front.home',['blogs' => $blogs]);
  }
  public function about()
  {
    return view('front.about');
  }

  public function contact()
  {
    return view('front.contact');
  }

  public function cart()
  {
    return view('front.cart');
  }

  public function checkout()
  {
    return view('front.checkout');
  }
  public function services()
  {
    return view('front.services');
  }

  public function shop()
  {
    return view('front.shop');
  }

  public function thankyou()
  {
    return view('front.thankyou');
  }
public function contactSubmit(Request $request)
  {
    $subject = $request->subject;
    $email = $request->email;
    $body = $request->message;
    Mail::send("front.mail",["body"=>$body], function ($message) use ($subject,$email) {
      $message->to('prestgg56@gmail.com')->subject("$email $subject");
    });

    return redirect()->back()->with('success','Ugurla Elave Olundu');
  } 
}
