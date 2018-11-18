<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //任務別
        Schema::create('types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 40)->default(''); //任務型態：掛號、諮詢、委託、...
            $table->string('color', 7)->default('');//顯示在任務中心的顏色
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
