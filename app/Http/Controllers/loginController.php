<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(){
        return view('login');
    }
    public function loginUser(Request $request){
        // dd($request->all());
        // if(Auth::attempt($request->only('email','password'))){
        //     return redirect('/pegawai');
        // }
        // return redirect('/login');
         $input = $request->all();
   
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);
   
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))){
            if (auth()->user()->role == "admin") {
                return redirect("/pegawai");
            }elseif(auth()->user()->role == "user") {
                return redirect('/tambahData');
            }
            else{
                return redirect('/login');
            }
        }else{
            return redirect('/login');
            
        }
    }
    public function register(){
        return view('register');
    }
    public function registerUser(Request $request){
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> bcrypt($request->password),
            "remember_token"=> Str::random(60),
        ]);
        return redirect('/login');
    }
    public function logout(){
        auth::logout();
        return redirect('/login');
    }

}
