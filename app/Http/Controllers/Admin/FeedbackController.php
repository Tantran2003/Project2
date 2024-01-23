<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class FeedbackController extends Controller
{
    public function index()
    {
        $contact = Contact::get();

        return view('admin.contact.index', compact('contact'));
    }
}
