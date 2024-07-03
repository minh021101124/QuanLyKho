<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    public function login(){
        return view('fe.login');
    }
    public function register(){
        return view('fe.register');
    }
    public function postRegister(Request $req){
        
       $req->merge(['password'=>Hash::make($req->password)]);
      
        try {
            User::create($req->all());
        } catch (\Throwable $th) {
            dd($th);
        }
       return redirect()->route('login');
    }
    public function postLogin(Request $req) {

        // Corrected syntax for associative array
        if(Auth::attempt(['email' => $req->email, 'password' => $req->password])) {
            return redirect()->route('index');
        }
    
        // 'Sai cmnr' is Vietnamese for 'Wrong password'
        return redirect()->back()->with('error','Sai password');
    }
    public function logout() {

       Auth::logout();
        return redirect()->back();
    }
    

}
