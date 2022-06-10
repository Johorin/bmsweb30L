<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//追加で以下を使用宣言
use App\Models\Bookinfo;
use Illuminate\Support\Facades\DB;

class BookinfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookinfo')->delete();   //最初に全件削除
        
        Bookinfo::create([
            'isbn' => '0001',
            'title' => 'java',
            'price' => '1001',
        ]);
        
        Bookinfo::create([
            'isbn' => '0002',
            'title' => 'c++',
            'price' => '1002',
        ]);
        
        Bookinfo::create([
            'isbn' => '0003',
            'title' => 'ruby',
            'price' => '1003',
        ]);
        
        Bookinfo::create([
            'isbn' => '0004',
            'title' => 'perl',
            'price' => '1004',
        ]);
        
        Bookinfo::create([
            'isbn' => '0005',
            'title' => 'database',
            'price' => '1005',
        ]);
    }
}
