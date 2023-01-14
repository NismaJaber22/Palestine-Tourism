<?php

namespace App\Http\Controllers;

use alert;
use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    // public function show(){
    //      return view('user.Contact');
    // }
    public function submit(Request $request){
        $data = $request->validate([
            'name'=>'required|min:2|max:50|string',
            'title'=>'required|max:50|min:3',
            'email' => 'required|email',
            'msg'=>'required',

        ]);

        // return $data;
        $contact = Contact::create($request->all());
               //--------------
        session()->flash('success', ' inserted successfuly');


        Mail::to( 'contact@tourism.com')->send(new ContactMail($request->name,$request->title,$request->email,$request->msg));
        return redirect()->back();
        // return $data;







    }
}
