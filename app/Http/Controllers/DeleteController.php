<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;

class DeleteController extends Controller
{
    public function index(Request $request) {
        //削除対象の書籍のisbnを取得
        $isbn = $request->isbn;
        
        //削除対象のレコードを取得して配列化
        $deleteBook = Bookinfo::selectByIsbn($isbn)->toArray();
        
        //削除対象のレコードを削除
        Bookinfo::deleteBook($isbn);
        
        //削除対象のレコード配列をdelete.blade.phpに渡して遷移
        return view('delete', ['deleteBook' => $deleteBook]);
    }
}
