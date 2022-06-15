<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function index(Request $request) {
        Auth::logout();
        
        return view('/logout');
    }
}
