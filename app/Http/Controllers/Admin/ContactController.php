<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('client.contact.index');
    }

    public function createContact(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'pnumber' => 'numeric|min:4',
            'mail' => 'email|min:4',
            'subject' => 'required|min:4',
        ]);
        $category = new Contact();
        $category->name = $request->name;
        $category->phone = $request->pnumber;
        $category->email = $request->mail;
        $category->message = $request->subject;
        $category->save();
        alert()->success('Message has been sent!', 'Successfully');
        return redirect()->back();
    }

    public function displayListContacts()
    {
        $contacts = Contact::orderBy("created_at", 'DESC')->get();
        return view('admin.contact.index', compact('contacts'));
        # code...
    }
}
