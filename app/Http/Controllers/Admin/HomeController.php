<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function profile() {
        return view('admin.user.profile');
    }

    public function tokenGen() {
        $randomToken = Str::random(80);
        
        /* selezionare l'utente a cui assegnare il token */
        $user = Auth::user();
        $user->api_token = $randomToken;
        $user->save();

        return redirect()->route('user.profile');
    }
}
