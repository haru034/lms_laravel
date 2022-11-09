<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Chats extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); // usersテーブルのid
            $table->foreign('user_id') 
                ->references('id')->on('users')
                ->onDelete('cascade');  // usersテーブルのidが削除された場合、同じuser_idをchatsテーブルから削除
            $table->string('nickname'); // ニックネーム
            $table->string('message'); // チャットの内容
            $table->timestamps();
            $table->dropColumn('updated_at'); // 更新日時を無効化
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
    }
}