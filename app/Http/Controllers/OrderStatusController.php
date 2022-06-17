<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orderinfo;

class OrderStatusController extends Controller
{
    public function index(Request $request) {
        //orderinfoテーブルを検索し登録されている書籍情報を格納
        $boughtBooks = Orderinfo::all()->toArray();
        
//         $selectSql = "SELECT A.user,B.title,A.quantity,A.date FROM orderinfo A inner join bookinfo B on A.isbn=B.isbn ORDER BY date";
//         $selectResult = executeQuery($selectSql);

        //orderStatus.blade.phpで表示させるデータ用に配列boughtBooksを加工して更新
        //要素の前に&を付けることで要素の値に対する参照を設定（配列を更新できるようにする）
        foreach($boughtBooks as &$record) {
            $record['title'] = Orderinfo::find($record['isbn'])->book->title;
            $record['userName'] = Orderinfo::find($record['user_id'])->user->name;
        }
        
        return view('orderStatus', compact('boughtBooks'));
    }
}
