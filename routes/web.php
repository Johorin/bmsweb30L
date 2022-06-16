<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('hello', function () {
//     return '<html><body><h1>Hello</h1><p>This is sample page.</p></body></html>';
// });

// Route::get('hello/{msg}', function ($msg) {
//     $html = <<<EOF
// EOF;
// });

//まとめて認証が済んでいないユーザーのアクセスを制限
Route::group(['middleware' => ['auth']], function(){
    //1.トップページ（メニュー画面）への遷移
    Route::get('/', function() {
        return view('menu');
    });
    
    //2.書籍一覧画面への遷移
    Route::get('/list', 'App\Http\Controllers\ListController@index');
    
//     //3.書籍登録画面（初期画面）への遷移
//     Route::get('/insert', function() {
//         return view('insert');
//     });
    
//     //4.書籍登録画面（登録ボタンから遷移）への遷移
//     Route::post('/insert', 'App\Http\Controllers\InsertController@insert');
    
//     //5.書籍登録画面へリダイレクト
//     Route::get('/insert_redirect', function() {
//         return redirect('/insert');
//     });
    
    //6.書籍詳細画面への遷移
    Route::get('/detail', 'App\Http\Controllers\DetailController@index');
    
    //7.書籍更新画面（初期画面）への遷移
    //     Route::get('/update', 'App\Http\Controllers\UpdateController@index');
    
//     //8.書籍更新画面（変更完了ボタンから遷移）への遷移
//     Route::post('/update', 'App\Http\Controllers\UpdateController@update');
    
//     //9.書籍削除画面への遷移
//     Route::get('/delete', 'App\Http\Controllers\DeleteController@index');
    
    //10.書籍検索（結果）画面への遷移
    Route::post('/search', 'App\Http\Controllers\SearchController@index');
    
    //11.一覧画面へリダイレクト
    Route::get('/list_redirect', function() {
        return redirect('/list');
    });
    
    //12.エラーの表示
    Route::get('/error', function() {
        return view('error');
    });
    
    /*** 3.0 ***/
    //ログイン後はメニュー画面に遷移
    Route::get('/home', 'App\Http\Controllers\HomeController@index');
    //カート状況確認画面への遷移
    Route::get('/showCart', 'App\Http\Controllers\ShowCartController@index');
    //購入履歴画面への遷移
    Route::get('/orderHistory', 'App\Http\Controllers\OrderHistoryController@index');
    //パスワード変更画面への遷移
    Route::get('/insertUser', 'App\Http\Controllers\InsertUserController@index');
    //ログアウト画面へのの遷移
    Route::get('/logout', 'App\Http\Controllers\LogoutController@index');
    
    //管理者のみ閲覧できるページにアクセス制限
    Route::group(['middleware' => ['rejectaccess']], function() {
        //3.書籍登録画面（初期画面）への遷移
        Route::get('/insert', function() {
            return view('insert');
        });
        //4.書籍登録画面（登録ボタンから遷移）への遷移
        Route::post('/insert', 'App\Http\Controllers\InsertController@insert');
        //5.書籍登録画面へリダイレクト
        Route::get('/insert_redirect', function() {
            return redirect('/insert');
        });
        //7.書籍更新画面（初期画面）への遷移
        Route::get('/update', 'App\Http\Controllers\UpdateController@index');
        //8.書籍更新画面（変更完了ボタンから遷移）への遷移
        Route::post('/update', 'App\Http\Controllers\UpdateController@update');
        //9.書籍削除画面への遷移
        Route::get('/delete', 'App\Http\Controllers\DeleteController@index');
        //初期データ登録画面への遷移
        Route::get('/insertIniData', 'App\Http\Controllers\InsertIniDataController@index');
        //購入状況確認画面への遷移
        Route::get('/orderStatus', 'App\Http\Controllers\OrderStatusController@index');
        //売上げ状況画面への遷移
        Route::get('/showSalesByMonth', 'App\Http\Controllers\ShowSalesByMonthController@index');
        //ユーザー登録画面への遷移
        Route::get('/insertUser', 'App\Http\Controllers\InsertUserController@index');
        //ユーザー一覧画面への遷移
        Route::get('/listUser', 'App\Http\Controllers\ListUserController@index');
    });
});






//ログイン画面へのルーティング
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
