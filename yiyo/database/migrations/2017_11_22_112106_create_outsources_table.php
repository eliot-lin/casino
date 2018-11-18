<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutsourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outsources', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mission_id')->unsigned()->default(0);      //對應任務
            $table->integer('company_id')->unsigned()->default(0);      //委外的公司
            $table->integer('requester_id')->unsigned()->default(0);    //使用者
            // $table->integer('company_type')->unsigned()->default(0); //委外型態    照護、健檢、派車、送藥....
            $table->string('price', 40)->default('');                   //報價
            $table->string('address', 80)->default('');                 //服務位置
            $table->text('requirement')->nullable();                   //服務需求
            
            $table->integer('request_at')->unsigned()->default(0);      //使用者請求時間
            $table->integer('getjob_at')->unsigned()->default(0);       //公司接單的時間
            $table->integer('service_at')->unsigned()->default(0);      //公司服務的時間
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('outsources');
    }
}
