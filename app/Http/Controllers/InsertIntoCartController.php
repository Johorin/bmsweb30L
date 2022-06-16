<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use App\Models\Bookinfo;

class InsertIntoCartController extends Controller
{
    public function index(Request $request) {
        //遷移元からのISBN番号（GETパラメータ）を取得
        $insertIsbn = $request->insertIsbn;
        
        //取得したISBNの書籍情報を検索して取得
        $addBookInfo_obj = Bookinfo::where('isbn', '=', $insertIsbn)->first();
        $addBookInfo[] = [
            'isbn' => $addBookInfo_obj->isbn,
            'title' => $addBookInfo_obj->title,
            'price' => $addBookInfo_obj->price,
            'quantity' => $request->quantity,   //購入数量も追加
        ];
        
        //その書籍情報をセッションに格納
        $request->session()->put('cartInfo', $addBookInfo);
        
//         return view('insertIntoCart', compact('addBookInfo'));
        return view('insertIntoCart', ['addBookInfo' => $addBookInfo]);
    }
}
