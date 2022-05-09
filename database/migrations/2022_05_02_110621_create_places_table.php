<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name'); //観光地名
            $table->string('address'); //住所
            $table->string('access'); //アクセス
            $table->string('homepage'); //ホームページのURL
            $table->string('content'); //詳細情報
            $table->string('image1'); //画像1
            $table->string('image2'); //画像2
            $table->string('image3'); //画像3
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
