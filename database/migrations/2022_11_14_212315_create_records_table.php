<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); // usersテーブルのid
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  // usersテーブルのidが削除された場合、同じuser_idをrecordsテーブルから削除
            $table->char('health'); // 生活リズム
            $table->smallInteger('kg'); // 体重
            $table->integer('study'); // 学習時間
            $table->text('thought'); // 感想
            $table->timestamps(); // 登録・更新日時
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
};
