<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetCartController extends Controller
{
    public function index(Request $request) {
        $request->session()->forget('cartInfo');
        
        return redirect('/list');
    }
}
