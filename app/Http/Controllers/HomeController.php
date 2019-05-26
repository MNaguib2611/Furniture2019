<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Admin;



class HomeController extends Controller
{
    public function showLoginForm(){
        if (Session::has('admin')) {
           return redirect('dashboard');
        }else {
            return view('loginForm');
        }
    }





   public function login(Request $request){

    $admin = Admin::where('username',$request->username)->where('password',$request->password)->get();

        if (count($admin) == 0 ) {

            return back()->with('failed-login','الرجاء التأكد من المستخدم و كلمة السر');
        }else {
            $request->session()->put('admin', $admin);
            return redirect('/dashboard');
        }
   }

   public function logout(Request $request){

    if(Session::has('admin'))
    {
        $request->session()->forget('admin');
        return redirect('/');

    } else{
        return redirect('/');
    }
   }


   public function dashboard(){
        return view('dashboard');
    }

    public function transactions(){
        return view('transactions');
    }


}
