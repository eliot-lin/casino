<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitals', function (Blueprint $table) {
            $table->increments('id'); //primary key
            $table->integer('city_id')->unsigned()->default(0); //foreign key
            $table->string('name', 40)->default('');
            $table->string('address', 40)->default('');
            $table->string('tel', 40)->default('');
            $table->text('website')->nullable();
            $table->string('level', 40)->default('');
            $table->string('lat', 40)->default('');// latitude
            $table->string('lng', 40)->default('');// longtitude
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitals');
    }
}
