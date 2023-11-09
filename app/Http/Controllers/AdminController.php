<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    function registrationindex()
    {
        return view('register');
    }
    function registration_form_submit(Request $req)
    {
        $register=new Registration();
        $register->fname=$req->first_name;
        $register->lname=$req->last_name;
        $register->email=$req->email;
        $register->password=$req->password;
        $register->save();
        return redirect()->route('login');
    }
    function loginindex()
    {
        return view('login');
    }
    function loginsubmit(Request $req)
    {
      $register=Registration::where('email',$req->email)->where('password',$req->password)->first();
      if($register)
      {
        $value=$register->id;
        Session::put('admin', $value);
        return view('index');
      }
      else{
        return redirect()->back();
      }
    }
    function profileindex()
    {
        return view('profile');
    }
    function editprofile()
    {
        $value = Session::get('admin');
    
        $profile=Registration::where('id',$value)->first();
        return view('edit-profile',compact('profile'));
    }
}