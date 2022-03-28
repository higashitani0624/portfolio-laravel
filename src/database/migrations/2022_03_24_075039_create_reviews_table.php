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
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('mail', 100);
            $table->integer('gender');
            $table->integer('age');
            $table->string('review',100);//レビュー内容
            $table->integer('opinion');//評価値
            $table->bigInteger('user_id')->unsigned();//ユーザid
            $table->timestamps();

            // 外部キーを設定する
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
