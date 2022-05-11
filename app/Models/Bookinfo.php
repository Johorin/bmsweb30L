<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//DBクラスを使用する宣言
use Illuminate\Support\Facades\DB;

class Bookinfo extends Model
{
    use HasFactory;
    
    //プライマリーキーの値が'id'ではないので設定
    protected $primaryKey = 'isbn';
    //マイグレーション時にテーブル名が'bookinfos'と認識されてしまっているため変更
    protected $table = 'bookinfo';
    //プライマリーキーがオートインクリメントではないため設定をオフ
    public $incrementing = false;
    //timestamps関連のレコードの自動更新をオフ
    public $timestamps = false;
    
    /*
     * 関数名：selectByIsbn
     * 引数：$isbn
     * 戻り値：Collectionクラス
     * 呼び出し元：書籍更新機能（UpdateController）
     * 機能：引数のISBNを元にDBのbookinfoテーブルから該当書籍データの検索を行う。
     */
    public function selectByIsbn($isbn) {
        return Bookinfo::where('isbn', '=', $isbn)->get();
    }
    
    /*
     * 関数名：insertBook
     * 引数：$insertBook
     * 戻り値：-
     * 呼び出し元：書籍登録機能（InsertController）
     * 機能：引数の書籍データを元にDBのbookinfoテーブルに新規登録処理を行う。
     */
    public function insertBook($insertBook) {
        Bookinfo::insert($insertBook);
    }
    
    /*
     * 関数名：updateBook
     * 引数：$isbn, $newBook
     * 戻り値：-
     * 呼び出し元：書籍更新機能（UpdateController）
     * 機能：引数の書籍データを元にDBのbookinfoテーブルから該当書籍データの更新処理を行う。
     */
    public function updateBook($isbn, $newBook) {
        Bookinfo::where('isbn', '=', $isbn)->update($newBook);
    }
    
    /*
     * 関数名：deleteBook
     * 引数：$isbn
     * 戻り値：-
     * 呼び出し元：書籍削除機能（DeleteController）
     * 機能：引数の書籍データ（ISBN）を元にDBのbookinfoテーブルから該当書籍データの削除処理を行う。
     */
    public function deleteBook($isbn) {
        Bookinfo::where('isbn', '=', $isbn)->delete();
    }
    
    /*
     * 関数名：searchBook
     * 引数：$isbn, $title, $price
     * 戻り値：Collectionクラス
     * 呼び出し元：書籍検索機能（SearchController）
     * 機能：引数の各データを元にDBのbookinfoテーブルから該当書籍データの絞込み検索処理を行う。
     */
    public function searchBook($isbn, $title, $price) {
        $searchBook = DB::table('bookinfo')
        ->where('isbn', 'like', '%' . $isbn . '%')
        ->where('title', 'like', '%' . $title . '%')
        ->where('price', 'like', '%' . $price . '%')
        ->get();
        
        return $searchBook;
    }
}
