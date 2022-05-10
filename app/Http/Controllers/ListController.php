<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Bookinfoモデルの使用宣言
use App\Models\Bookinfo;

class ListController extends Controller
{
    public function index(Request $request) {
        if(isset($request->transition)) {
            switch($request->transition) {
                //メニュー画面、書籍一覧リンク、全検索ボタン（、書籍更新処理後画面）から遷移してきたときには全検索処理
                case 'menu':
                case 'list':
                case 'searchAll':
                case 'updated':
                    //isbn昇順の全検索結果（Collection型）を変数resultに格納
                    $result = Bookinfo::orderby('isbn', 'asc')->get();
                    break;
                //上記以外からの遷移の場合はトップページ（menu.php）に遷移
                default:
                    return redirect('/');
            }
            return view('list', ['result' => $result]);
        }
        //どこのページから遷移してきたのかの情報（$request->transition）が無ければトップページ（menu.php）に遷移
        return redirect('/');
    }
}