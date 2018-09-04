<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function getLogin(){
        return view('backend.login');
    } 

    public function postLogin(Request $request){
        $array = ['email' => $request->email, 'password' => $request->password];
        
        if(Auth::attempt($array)){
            return redirect()->intended('admin/home');
        }
        else{
            return back()->withInput()->with('error','tai khoan hoac mat khau chua dung');
        }

    }
}
