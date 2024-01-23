<?php

namespace App\Http\Controllers\Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    public function index()
    {
        return view('interface/pages/contact');
    }

    public function store(Request $request)
    {
        // $validate = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone' => 'required|numeric|digits:10',
        //     'comment' => 'required'
        // ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;
     
        $contact->save();

        return redirect()->route('gd.contactindex')->with('success', "Gửi thành công");
    }
}
