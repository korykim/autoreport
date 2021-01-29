<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerPeopleTable extends Migration
{
    public function up()
    {
        Schema::create('customer_people', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->String('name')->unique();
            $table->String('email')->nullable();
            $table->String('tel')->nullable();
            $table->String('hp')->nullable();
            $table->String('wechat')->nullable();
            $table->Boolean('sex')->nullable();
            $table->integer('age')->nullable();
            $table->String('fax')->nullable();
            $table->integer('customer_id')->unsigned()->default(0);
            $table->index('customer_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_people');
    }
}
