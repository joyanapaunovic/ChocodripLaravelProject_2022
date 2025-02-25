<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends BaseController
{
    //
    public function index(){
        return view('pages.register');
    }

    public function store(\App\Http\Requests\Request $request){
        // INSERT
        $validatedFirstName = $request->safe()->only(['name', 'firstName']);
        $validatedLastName = $request->safe()->only(['name', 'lastName']);
        $validatedEmail = $request->safe()->only(['name', 'email']);
        $validatedPassword = $request->safe()->only(['name', 'password']);
        $validatedPassword['password'] = md5($validatedPassword['password']);
//        dd($validatedFirstName);
//        dd(md5($validatedPassword['password']));
       try {
           DB::beginTransaction();
           DB::table('users')->insert([
               'first_name' => $validatedFirstName['firstName'],
               'last_name' => $validatedLastName['lastName'],
               'email' => $validatedEmail['email'],
               'password' => $validatedPassword['password'],
               'id_role' => 2
           ]);
           DB::commit();
       }
       catch(Exception $e){
           DB::rollBack();
           return redirect()->back()->with('error-msg', $e->getMessage());
       }

        return back()->with("success-msg", "You've successfully registered!");
    }

}
