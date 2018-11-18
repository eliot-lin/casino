<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
       

        Schema::create('vips', function (Blueprint $table) {
            $table->increments('id'); // primary key
            $table->integer('user_id')->unsigned()->default(0);
            $table->string('card_no', 40)->default('');
            $table->string('occupation', 40)->default('');
            $table->string('height')->default('');
            $table->string('weight')->default('');
            $table->string('blood_type', 10)->default('');
            $table->tinyInteger('handicapped')->default(0);
            $table->string('religion', 40)->default('');
            $table->string('address_visit', 40)->default('');
            
            //聯絡人資訊
            $table->string('contact', 40)->default('');
            $table->string('contact_relationship', 40)->default('');
            $table->string('contact_phone', 40)->default('');
            $table->string('contact_address', 40)->default('');
            
            //直接給default?
            $table->text('medicine_records')->nullable();
            
            //group
            $table->integer('group_id')->unsigned()->default(0); // foreign key
            $table->tinyInteger('is_manager')->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vips');
    }
}
