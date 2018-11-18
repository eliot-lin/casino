<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id'); // primary key
            $table->integer('city_id')->unsigned()->default(0); //foreign key
            
            $table->string('type', 40)->default('');
            $table->string('email_main',40)->default('');
            $table->string('email_vice',40)->default('');
            $table->string('password',255)->default('');
            $table->string('id_no',10)->default('');
            $table->string('name',40)->default('');
            $table->text('portrait')->nullable();
            $table->double('score')->default(0);
            $table->string('cell',40)->default('');
            $table->string('tel_home',40)->default('');
            $table->string('tel_office',40)->default('');
            $table->tinyInteger('sex')->default(0);
            $table->string('passport',40)->default('');
            $table->string('birthday', 10)->default('');
            $table->string('nationality',40)->default('');
            $table->tinyinteger('marital_status')->default(0);
            $table->string('education',40)->default('');
            $table->string('language',40)->default('');
            $table->string('address', 40)->default('');
            $table->tinyInteger('hierarchy')->default(0);
            $table->string('device_token', 255)->default('');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
