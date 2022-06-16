<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//追加
use App\Models\Bookinfo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class InsertIniDataController extends Controller
{
    public function index(Request $request) {
        //書籍データがデータベースに存在するか確認し検索結果がヒットすればエラー
        if(Bookinfo::all()->first()) {
            $errMsg = '既にDBに書籍データが存在するため、初期登録は行えませんでした。';
            return view('error', ['errMsg' => $errMsg]);
        }
        
//         $file_path = Storage::disk('public')->url('file/initial_data.csv');
        $file_path = storage_path('app/public/file/initial_data.csv');
        //読み込みファイルが所定の位置になければエラー
        if(!File::exists($file_path)) {
            $errMsg = '初期データファイルが無い為、登録は行えません。';
            return view('error', ['errMsg' => $errMsg]);
        }
        //csvファイル取得
        $csvFile = new \SplFileObject($file_path);
        $csvFile->setFlags(
            \SplFileObject::READ_CSV |      // CSVとして行を読み込み
            \SplFileObject::READ_AHEAD |    // 先読み／巻き戻しで読み込み
            \SplFileObject::SKIP_EMPTY |    // 空行を読み飛ばす
            \SplFileObject::DROP_NEW_LINE   // 行末の改行を読み飛ばす
        );
        //１行ずつ読み込む
        foreach($csvFile as $record) {
            //DBに挿入
            Bookinfo::create([
                'isbn' => $record[0],
                'title' => $record[1],
                'price' => $record[2],
            ]);
            //insertIniData.blade.phpに渡す初期データリスト
            $iniBookList[] = [
                'isbn' => $record[0],
                'title' => $record[1],
                'price' => $record[2],
            ];
        }
        
        return view('insertIniData', ['iniBookList' => $iniBookList]);
    }
}
