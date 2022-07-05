<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function submit(ContactRequest $req)
    {
        $contact = new Contact();
        $contact->name = Auth::user()->name;
        $contact->email =  Auth::user()->email;
        $contact->submit = $req->input('submit');
        $contact->message = $req->input('message');
        $contact->file = $req->input('file');
        $contact->save(); //раскладывает по секторам и сохроняет заявку

        return redirect()->route('home');
    }
}
