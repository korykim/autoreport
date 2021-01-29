<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerPeopleTable extends Migration
{
    public function up()
    {
        Schema::create('buyer_people', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->String('name')->unique();
            $table->String('email')->nullable();
            $table->String('tel')->nullable();
            $table->String('hp');
            $table->String('wechat')->nullable();
            $table->Boolean('sex')->nullable();
            $table->integer('age')->nullable();
            $table->String('fax')->nullable();
            $table->integer('buyer_id')->unsigned()->default(0);
            $table->index('buyer_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buyer_people');
    }
}
