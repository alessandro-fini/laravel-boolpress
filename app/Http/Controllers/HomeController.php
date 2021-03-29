<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Lead;
use App\Mail\SendNewMail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contacts() {
        return view('guest.contacts');
    }

    public function sendEmail(Request $request) {
        $data = $request->all();

        $newLead = new Lead();
        $newLead->fill($data);
        $newLead->save();
        Mail::to('test@boolpress.com')->send(new SendNewMail($newLead));

        return redirect()->route('guest.contacts')->with('status', 'Email inviata correttamente.');
    }
}
