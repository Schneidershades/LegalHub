<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
    	$contacts = Contact::latest()->get();
    	return view('dashboard.admin.contact.index')->with('contacts', $contacts);
    }
}
