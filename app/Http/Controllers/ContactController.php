<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends BaseController
{
    //
    public function index(){
        return view('pages.main.contact');
    }

    public function store(ContactRequest $request){
        $validatedFirstName = $request->safe()->only(['name', 'firstNameContact']);
        $validatedLastName = $request->safe()->only(['name', 'lastNameContact']);
        $validatedEmail = $request->safe()->only(['name', 'emailContact']);
        $validatedMessage = $request->safe()->only(['name', 'message']);

        try {
            DB::beginTransaction();
            DB::table('messages')->insert([
                'first_name' => $validatedFirstName['firstNameContact'],
                'last_name' => $validatedLastName['lastNameContact'],
                'email' => $validatedEmail['emailContact'],
                'message_content' => $validatedMessage['message'],
                'sent_at' => date('Y-m-d H:i:s')
            ]);
            DB::commit();
        }
        catch(Exception $e){
            DB::rollBack();
            return redirect()->back()->with('error-msg', $e->getMessage());
        }
        return back()->with("success-msg", "Your message was successfully sent!");
    }

}
