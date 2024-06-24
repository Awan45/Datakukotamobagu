<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth, Hash, File;
use Validator;
use App\Http\Controllers\MainController;

class LoginController extends Controller
{
     public function index(){
        // dd('login view');
        if(Auth::user()){
            return Redirect::to(url()->previous());
        }

        return view('login');
    }
    public function post(Request $request){
        // dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if(Auth::attempt($credentials)){
            // dd(Auth::user());
            
            return redirect()->intended('/')->withSuccess('Login Successful');

        }
        return redirect("login")->with('deleted', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();
 
        return redirect('/login');
    }
}
