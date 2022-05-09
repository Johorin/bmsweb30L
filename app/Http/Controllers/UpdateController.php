<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;
//バリデータの使用宣言
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    //初期画面
    public function index(Request $request) {
        return view('update');
    }
    
    public function update(Request $request) {
        //バリデーションの検証ルールを設定
        $rules = [
            'isbn' => 'exsists: bookinfo, isbn',    //そのデータが既に存在しているか
            'title' => 'required',                  //入力されているか
            'price' => 'required|numeric',          //入力されているか｜数値か
        ];
        
        //エラーの際に表示させるメッセージを設定
        $errMsgs = [
            'isbn.exsists' => '入力ISBNは既に登録済みの為、書籍登録処理は行えませんでした。',
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
        
        //送られてきたデータの送信方式がGET送信かPOST送信かで処理を分ける
        if(isset($_GET['isbn'])) {  //GET送信された入力データが存在する場合
            //変更対象のisbnを取得
            $isbn = $request->isbn;
            
            //新しい書籍情報を格納する配列$newBookをエラー回避のために空文字で初期化
            $newBook = array();
            
            //対象isbnのレコードをCollectionで取得
            $updateBook = Bookinfo::selectByIsbn($isbn);
            
            //Collection型の$updateBookを配列化
            $updateBook->toArray();
            
            //新しく変更する内容を$newBookに格納
            $newBook = [
                'title' => $updateBook['title'],
                'price' => $updateBook['price'],
            ];
        } elseif(isset($_POST['isbn'])) {   //POST送信された入力データが存在する場合
            //変更対象のデータを取得
            $isbn = $request->isbn;
            $title = $request->title;
            $price = $request->price;
            
            //新しく変更する内容を$newBookに格納
            $newBook = [
                'title' => $title,
                'price' => $price,
            ];
        } else {    //送信された入力データが存在しない場合
            //メニュー画面にリダイレクト
            return redirect('/');
        }
        
        //更新データをDBに登録
        Bookinfo::where('isbn', '=', $isbn)
            ->update([
                'title' => $newBook['title'],
                'price' => $newBook['price'],
            ]);
    }
}
