<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use App\Mail\RegisterMail;
use Illuminate\Support\Facades\Auth;
use App\Models\Orderinfo;

class BuyConfirmController extends Controller
{
    public function index(Request $request) {
        //カートの中身があるかチェック
        $sessionCartInfo = $request->session()->get('cartInfo');
        if(!isset($sessionCartInfo)) {
            $errMsg = 'カートに書籍が入っていません。購入処理は行えませんでした。';
            return response(view('error', compact('errMsg')));
        }
        
        /* カートの中の書籍情報をorderinfoテーブルに登録 */
        //cartInfoパラメータのセッションの内容を変数に用意
        $cartInfo = $request->session()->get('cartInfo');
        
        //購入情報をDBのorderinfoテーブルに登録
        foreach($cartInfo as $boughtBook) {
            Orderinfo::create([
                'user_id' => Auth::user()->id,
                'isbn' => $boughtBook['isbn'],
                'quantity' => $boughtBook['quantity'],
                'date' => date("Y-m-d"),
            ]);
        }
        
        /* 自動メール送信処理 */
        //本文に渡す内容配列で用意
        $cartInfoAndTotal = [
            'cartInfo' => $cartInfo,
            'total' => $request->total,
        ];
        //メール自動送信
        RegisterMail::register($cartInfoAndTotal);
        
        /* カートの中身削除 */
        $request->session()->forget('cartInfo');
        
        return view('buyConfirm', compact('cartInfoAndTotal'));
    }
}
