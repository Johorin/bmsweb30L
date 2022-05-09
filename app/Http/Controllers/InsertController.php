<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;
//バリデータの使用宣言
use Illuminate\Support\Facades\Validator;

class InsertController extends Controller
{
    //初期画面への遷移
    public function index() {
        return view('insert');
    }
    
    //insert.blade.phpの登録ボタンからの遷移
    public function insert(Request $request) {
        //バリデータのセット
        $validator = Validator::make($request->all(), [
            'isbn' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
        ]);
        
        //バリデーションのエラーチェック
        if($validator->fails()) {
            //エラー項目が見つかればerror.blade.phpに遷移
            return redirect('/error')->withErrors($validator);
        }
        
        //登録書籍情報の設定
        $param = [
            'isbn' => $request->isbn,
            'title' => $request->title,
            'price' => $request->price,
        ];
        
        //ユーザー定義関数を用いて書籍登録を実行
        Bookinfo::insertBook($param);
        
        //登録した書籍情報と共にinsert.blade.phpに遷移
        return view('insert', ['insertData' => $param]);
    }
}
