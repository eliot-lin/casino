<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id'); //primary key
            $table->integer('mission_id')->unsigned()->default(0); //foreign key
            $table->integer('from_id')->unsigned()->default(0); // foreign key
            $table->integer('to_id')->unsigned()->default(0); // foreign key
            $table->integer('created_at')->unsigned()->default(0);
            $table->tinyInteger('source_type')->default(0);
            $table->text('source')->nullable(); //通話(時間), 圖音訊(檔案路徑), 訊息(文字)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
