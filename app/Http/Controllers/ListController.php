<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;

class ListController extends Controller
{
    public function index(Request $request) {
        $result = Bookinfo::orderby('isbn', 'asc')->get();
        
        return view('list', ['result' => $result]);
    }
}