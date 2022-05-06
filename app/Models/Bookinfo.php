<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookinfo extends Model
{
    use HasFactory;
    
    //プライマリーキーの値が'id'ではないので設定
    protected $primaryKey = 'isbn';
    //マイグレーション時にテーブル名が'bookinfos'と認識されてしまっているため変更
    protected $table = 'bookinfo';
    //timestamps関連のレコードは不要
    public $timestamps = false;
}
