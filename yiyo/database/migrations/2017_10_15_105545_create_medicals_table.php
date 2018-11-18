<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->default(0);
            $table->integer('hospital_id')->unsigned()->default(0); //foreign key
            $table->integer('occupation_id')->unsigned()->default(0); //foreign key
            $table->integer('division_main_id')->unsigned()->default(0); //foreign key
            $table->integer('division_vice_id')->unsigned()->default(0); //foreign key
            $table->text('type_id_array')->nullable(); //任務種類
            $table->string('relationship', 11)->default("合約"); // 合約 
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicals');
    }
}
