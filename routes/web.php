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

//1.トップページ（メニュー画面）への遷移
Route::get('/', function() {
    return view('menu');
});

//2.書籍一覧画面への遷移
Route::get('/list', 'ListController@index');

//3.書籍登録画面（初期画面）への遷移
Route::get('/insert', function() {
    return view('insert');
});

//4.書籍登録画面（登録ボタンから遷移）への遷移
Route::post('/insert', 'InsertController@insert');

//5.書籍登録画面へリダイレクト
Route::get('/insert_redirect', function() {
    return redirect('/insert');
});

//6.書籍詳細画面への遷移
Route::get('/detail', 'DetailController@index');

//7.書籍更新画面（初期画面）への遷移
Route::get('/update', 'UpdateController@index');

//8.書籍更新画面（変更完了ボタンから遷移）への遷移
Route::post('/update', 'UpdateController@update');

//9.書籍削除画面への遷移
Route::get('/delete', 'DeleteController@index');

//10.書籍検索（結果）画面への遷移
Route::post('/search', 'SearchController@index');

//11.一覧画面へリダイレクト
Route::get('/list_redirect', function() {
    return redirect('/list');
});

//12.エラー処理
Route::get('/error', 'DeleteController@index');






