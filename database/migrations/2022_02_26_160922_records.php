<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Records extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id'); // ID(user_id)
            $table->integer('user_id'); // usersテーブルのid
            $table->datetime('start_time'); // 学習の開始時刻
            $table->datetime('end_time'); // 学習の終了時刻
            $table->string('lifestyle'); // 生活リズム
            $table->string('learning_time'); //　学習時間
            $table->string('thoughts'); //　感想
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
