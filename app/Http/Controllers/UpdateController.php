<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;
//バリデータの使用宣言
use Illuminate\Support\Facades\Validator;

class UpdateController extends Controller
{
    //GET送信でアクセスする場合（list.blade.php、detail.blade.phpからの遷移）
    public function index(Request $request) {
        //バリデーションの検証ルールを設定
        $rules = [
            'isbn' => 'exists:bookinfo,isbn'    //そのデータが既に存在しているか（空白入れたらエラーになるので注意）
        ];
        
        //エラーの際に表示させるメッセージを設定
        $errMsgs = [
            'isbn.exists' => '更新対象の書籍は存在しない為、書籍更新処理は行えませんでした。',
        ];
        
        //Validatorインスタンスを作成
        $validator = Validator::make($request->query(), $rules, $errMsgs);
        
        //バリデーションのエラーチェック
        if($validator->fails()) {
            //更新対象のデータが見つからなければerror.blade.phpに遷移し、エラー内容を$errorsとして送る
            return redirect('/error')
                ->withErrors($validator);
        }
        
        //変更対象のisbnを取得
        $isbn = $request->isbn;
        
        //新しい書籍情報を格納する配列$newBookをエラー回避のために空文字で初期化
        $newBook = array();
        
        //変更対象のレコードを取得
        $updateBook = Bookinfo::selectByIsbn($isbn);
        
        //変更対象のレコードを配列化（二次元配列）
        $updateBook = $updateBook->toArray();
        
        //変更対象のレコード配列をupdate.blade.phpに渡して遷移
        return view('update', ['updateBook' => $updateBook]);
    }
    
    //POST送信でアクセスする場合（自分自身からの遷移）
    public function update(Request $request) {
        //バリデーションの検証ルールを設定
        $rules = [
            'isbn' => 'exists:bookinfo,isbn',    //そのデータが既に存在しているか
            'newTitle' => 'required',               //入力されているか
            'newPrice' => 'required|numeric',       //入力されているか｜数値か
        ];
        
        //エラーの際に表示させるメッセージを設定
        $errMsgs = [
            'isbn.exists' => '更新対象の書籍は存在しない為、書籍更新処理は行えませんでした。',
            'newTitle.required' => 'タイトルが未入力の為、書籍更新処理は行えませんでした。',
            'newPrice.required' => '価格が未入力の為、書籍更新処理は行えませんでした。',
            'newPrice.numeric' => '価格の値が不正の為、書籍更新処理は行えませんでした。',
            //追加ルールのメッセージ設定
            'newPrice.min' => '価格が0未満の為、書籍更新処理は行えませんでした。',
        ];
        
        //Validatorインスタンスを作成
        $validator = Validator::make($request->all(), $rules, $errMsgs);
        
        //検証ルール追加（priceが整数だったらさらにその数値が0以上かチェック）
        $validator->sometimes('newPrice', 'min:0', function($input) {
            return is_numeric($input->price);
        });
        
        //バリデーションのエラーチェック
        if($validator->fails()) {
            //エラー項目が見つかればerror.blade.phpに遷移し、エラー内容を$errorsとして送る
            return redirect('/error')
            ->withErrors($validator);
        }
        
        //新しく変更するデータを取得
        $isbn = $request->isbn;
        $newTitle = $request->newTitle;
        $newPrice = $request->newPrice;
        
        //変更前のデータも取得
        $oldTitle = $request->oldTitle;
        $oldPrice = $request->oldPrice;
        
        //新しく変更するレコードを$newBookに格納
        $newBook = [
            'isbn' => $isbn,
            'title' => $newTitle,
            'price' => $newPrice,
        ];
        
        //変更前のレコードを配列として作成
        $oldBook = [
            'isbn' => $isbn,
            'title' => $oldTitle,
            'price' => $oldPrice,
        ];
        
        //更新データをDBに登録
        Bookinfo::updateBook($isbn, $newBook);
        
        //変更前のレコード配列と変更後のレコード配列をupdate.blade.phpに渡して遷移
        return view('update', ['newBook' => $newBook, 'oldBook' => $oldBook]);
    }
}
