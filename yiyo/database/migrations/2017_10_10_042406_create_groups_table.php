<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level_id')->unsigned()->default(0); // foreign key
            $table->integer('sales_id')->unsigned()->default(0); // foreign key
            
            $table->string('name', 40)->default(''); //家庭持卡人、公司 名稱 
            $table->string('type', 1)->default(''); //家庭(0) or 公司 (1)
            $table->integer('count')->unsigned()->default(0); // 家庭最多四個 、 公司無限擴充 至少四人以上

            $table->text('token')->nullable();

            $table->tinyInteger('status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
