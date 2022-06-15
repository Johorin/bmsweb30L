<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ListUserController extends Controller
{
    public function index(Request $request) {
        $listUser = User::all();
        
        return view('listUser', ['listUser' => $listUser]);
    }
}
