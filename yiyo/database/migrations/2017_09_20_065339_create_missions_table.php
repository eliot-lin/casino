<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('missions', function (Blueprint $table) {
            $table->increments('id'); //primary key
            $table->integer('parent_id')->unsigned()->default(0); //foreign key
            $table->integer('requester_id')->unsigned()->default(0); //foreign key
            $table->integer('provider_id')->unsigned()->default(0); // foreign key
            $table->integer('type_id')->unsigned()->default(0); //foreign key
            $table->integer('status_id')->unsigned()->default(0); //foreign key
            $table->tinyInteger('method')->default(0); // 訊息 電話 錄音
            $table->string('group_name', 40)->default('');
            $table->string('vip_card_no', 40)->default('');
            $table->string('type_name', 40)->default('');
            $table->string('requester_name', 40)->default('');
            $table->string('provider_name', 40)->default('');
            $table->string('status_name', 40)->default('');
            $table->text('description')->nullable(); //掛號資訊, 問診資訊
            $table->tinyInteger('mission_score')->default(0);
            $table->tinyInteger('provider_score')->default(0);
            $table->text('suggestion')->nullable();
            
            $table->string('date', 40)->default('');
            $table->integer('issued_at')->unsigned()->default(0);
            $table->integer('took_at')->unsigned()->default(0);
            $table->integer('finished_at')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('missions');
    }
}
