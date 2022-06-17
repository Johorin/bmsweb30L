<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderinfo extends Model
{
    use HasFactory;
    
    //プライマリーキーの値が'id'ではないので設定
    protected $primaryKey = 'orderno';
    //timestamps関連のレコードの自動更新をオフ
    public $timestamps = false;
    //次のデータの挿入を許可する
    protected $fillable = [
        'user_id',
        'isbn',
        'quantity',
        'date',
    ];
    
    //bookinfoテーブルに対するリレーションを定義
    public function book() {
        //外部キー名が'リレーションメソッド名_id'でない場合や
        //親モデルの主キーがidを採用していない場合は
        //それぞれ第２引数、第３引数のように指定する必要がある
        //（こうしないとうまくリレーション先のデータを取ってこれない）
        return $this->belongsTo('App\Models\Bookinfo', 'isbn', 'isbn');  //多対一
    }
    
    //usersテーブルに対するリレーションを定義
    public function user() {
        return $this->belongsTo('App\Models\User');  //多対一
    }
}
