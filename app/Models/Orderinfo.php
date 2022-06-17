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
        return $this->belongsTo('App\Models\Bookinfo');  //多対一
    }
}
