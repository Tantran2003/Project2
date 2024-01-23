<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Carbon;
class ContactController extends Controller
{
    public function index()
    {
        return view('interface/contact/contact');
    }

    public function contact(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'comment' => 'required'
        ]);
        $current = new Carbon();
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;
        $contact->date = $current;

        $contact->save();
        return redirect()->route('interface/contact/contact')->with('msg','Contact successfully !!! ');
    }
}
