<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\createContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contact = Contact::paginate(5);
        return view('admin.contact.index', compact('contact'));
    }

    public function store(createContactRequest $request)
    {
        $contact = new Contact();
        $contact->fullname = $request->fullname;
        $contact->email = $request->email;
        $contact->comment = $request->comment;
        $contact->save();
        session()->flash('contact','پیام شما با موفقیت بارگذاری شد');
        return redirect()->route('show');
    }
    public function show($contact) {
        $contactData = Contact::findOrFail($contact);
        return $contactData;
    }

    public function destroy($contact)
    {
        Contact::destroy($contact);
        session()->flash('delete','عملیات پاک کردن دیتا با موفقیت انجام شد');
        return redirect()->route('contact.index');
    }
}
