<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DeleteUserController extends Controller
{
    public function index(Request $request) {
        //送られてきた削除対象のユーザーIDを取得
        $deleteUserName = $_GET['deleteUserName'];
        
        //コレクション型でユーザー情報取得
        $deletedUserInfo = User::where('name', $deleteUserName)->get();
        
        //削除する予定のユーザーがログイン中のユーザーだった場合は削除処理をキャンセルしてエラー画面に遷移
        if(Auth::user()->name === $deleteUserName) {
            //
        }
        
        /* ユーザー情報削除 */
        User::where('name', $deleteUserName)->delete();
        
        return view('deleteUser', ['deletedUser' => $deletedUserInfo]);
    }
    
}
