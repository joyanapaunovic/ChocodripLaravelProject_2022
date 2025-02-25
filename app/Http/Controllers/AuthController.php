<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends BaseController
{
    // LOG IN FORM
    public function showLoginForm(){
        return view('pages.auth.login', ['data' => $this->data]);
    }
    // LOG IN
    public function doLogin(LoginRequest $request){
        $email = $request->input('emailLogin');
        $password = md5($request->input('passwordLogin'));
        //        dd($email);
        //        dd($password);

       try {
           $user = DB::table('users')
               ->join('roles', 'users.id_role', '=', 'roles.id')
               ->where('email', '=', $email)
               ->where('password', '=', $password)->first();
            // dd($user);
           if(!$user){
               return redirect()->back()->with('error-msg', 'Incorrect password or e-mail address. Please try again.');
           }
           // SESSION USER
           $userLogged = $request->session()->put('user', $user);
           $cart = $request->session()->put('cartItems', []);
//            dd($request->session()->get('user')->email);
           if($request->session()->get('user')->id_role == 1){
               return redirect()->route('admin-panel');
           }
           else {
               return redirect()->back()->with('success-msg', "You've successfully logged in to your account.");
           }
       }
       catch(Exception $e){
           return redirect()->back()->with('error-msg', $e->getMessage());
       }

    }
    // LOG OUT
    public function logout(Request $request){
        if($request->session()->has('user')){
            $request->session()->forget('user');
        }
        return redirect()->route('login');
    }

}
