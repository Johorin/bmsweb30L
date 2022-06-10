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
        //バリデーションの検証ルールを設定
        $rules = [
            'isbn' => 'required|unique: bookinfo, isbn',    //入力されているか｜重複していないか
            'title' => 'required',                          //入力されているか
            'price' => 'required|numeric',                  //入力されているか｜数値か
        ];
        
        //エラーの際に表示させるメッセージを設定
        $errMsgs = [
            'isbn.required' => 'ISBNが未入力の為、書籍登録処理は行えませんでした。',
            'isbn.unique' => '入力ISBNは既に登録済みの為、書籍登録処理は行えませんでした。',
            'title.required' => 'タイトルが未入力の為、書籍登録処理は行えませんでした。',
            'price.required' => '価格が未入力の為、書籍登録処理は行えませんでした。',
            'price.numeric' => '価格の値が不正の為、書籍登録処理は行えませんでした。',
            //追加ルールのメッセージ設定
            'price.min' => '価格が0未満の為、書籍登録処理は行えませんでした。',
        ];
        
        //Validatorインスタンスを作成
        $validator = Validator::make($request->all(), $rules, $errMsgs);
        
        //検証ルール追加（priceが整数だったらさらにその数値が0以上かチェック）
        $validator->sometimes('price', 'min:0', function($input) {
            return is_numeric($input->price);
        });
        
        //バリデーションのエラーチェック
        if($validator->fails()) {
            //エラー項目が見つかればerror.blade.phpに遷移し、エラー内容を$errorsとして送る
            return redirect('/error')
                ->withErrors($validator);
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
