<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookinfo', function (Blueprint $table) {
            $table->string('isbn', 30)->primary();    //isbn varchar(20) primary key
            $table->string('title', 100);             //title varcahr(100)
            $table->integer('price');                 //price integer
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookinfo');
    }
}
