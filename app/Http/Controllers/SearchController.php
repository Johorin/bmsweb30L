<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;

class SearchController extends Controller
{
    public function index(Request $request) {
        //list.blade.phpとsearch.blade.phpの「検索」ボタンからの遷移以外はトップページにリダイレクト
        if(!isset($request->listButton) && !isset($request->searchButton)) {
            return redirect('/');
        }
        
        $isbn = $request->isbn;
        $title = $request->title;
        $price = $request->price;
        
        $searchBook = Bookinfo::searchBook($isbn, $title, $price);
        
        $oldSearch = [
            'isbn' => $isbn,
            'title' => $title,
            'price' => $price,
        ];
        
        return view('search', ['searchBook' => $searchBook, 'oldSearch' => $oldSearch]);
    }
}
