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
    
    //bookinfoテーブルに対するリレーションを定義
    public function book() {
        return $this->belongsTo('App\Models\Bookinfo');  //多対一
    }
}
