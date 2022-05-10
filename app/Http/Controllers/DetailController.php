<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;
//バリデータの使用宣言
use Illuminate\Support\Facades\Validator;

class DetailController extends Controller
{
    public function index(Request $request) {
        //バリデーションの検証ルールを設定
        $rules = [
            'isbn' => 'exists:bookinfo,isbn'    //そのデータが既に存在しているか（空白入れたらエラーになるので注意）
        ];
        
        //エラーの際に表示させるメッセージを設定
        $errMsgs = [
            'isbn.exists' => '詳細対象の書籍が存在しない為、詳細情報処理は行えません。',
        ];
        
        //Validatorインスタンスを作成
        $validator = Validator::make($request->query(), $rules, $errMsgs);
        
        //バリデーションのエラーチェック
        if($validator->fails()) {
            //更新対象のデータが見つからなければerror.blade.phpに遷移し、エラー内容を$errorsとして送る
            return redirect('/error')
            ->withErrors($validator);
        }
        
        //詳細対象の書籍のisbnを取得
        $isbn = $request->isbn;
        
        //詳細対象のレコードを取得して配列化
        $detailBook = Bookinfo::selectByIsbn($isbn)->toArray();
        
        //詳細対象のレコード配列をdetail.blade.phpに渡して遷移
        return view('detail', ['detailBook' => $detailBook]);
    }
}
