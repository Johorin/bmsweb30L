<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('menu');
    }
    
//     //ログイン情報のセッションが切れたらログイン画面にリダイレクトさせる関数
//     public function getAuth(Request $request) {
//         $param = ['message' => 'ログインして下さい。'];
        
//         return view('auth.auth', $param);
//     }
    
//     //ログイン情報が送られてきたらログインを実行
//     public function postAuth(Request $request) {
//         $email = $request->email;
//         $password = $request->password;
//         $authority = $request->authority;
        
//         if(Auth::attempt([
//             'email' => $email,
//             'password' => $password,
//             'authority' => $authority,
//         ])) {
//             $msg = 'ログインしました。(' . Auth::user()->name . ')';
//         } else {
//             $msg = 'ログインに失敗しました。';
//         }
//         return view('auth.auth', ['message' => $msg]);
//     }
}
