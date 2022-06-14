<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderinfos', function (Blueprint $table) {
            $table->increments('orderno');  //主キー（INT）
            $table->foreignId('user_id')->constrained('users');  //usersテーブルの外部キー
            $table->string('isbn', 30);
            $table->foreign('isbn')->references('isbn')->on('bookinfo');  //bookinfoテーブルの外部キー
            $table->integer('quantity');    //購入数量
            $table->date('date');           //注文日
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderinfos');
    }
}
