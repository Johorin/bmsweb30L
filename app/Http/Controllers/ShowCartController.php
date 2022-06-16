<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowCartController extends Controller
{
    public function index(Request $request) {
        //cartInfoパラメータのセッション情報を取得
        $cartContents = $request->session()->get('cartInfo');
        
        //カートの中の書籍の価格を合計
        $total = 0;
        foreach($cartContents as $cartRecord) {
            $total += $cartRecord['price'] * $cartRecord['quantity'];
        }
        
        //showCartビューに渡す配列を用意
        $cartContentsAndTotal = [
            'cartContents' => $cartContents,
            'total' => $total,
        ];
        
        return view('showCart', compact('cartContentsAndTotal'));
    }
}
