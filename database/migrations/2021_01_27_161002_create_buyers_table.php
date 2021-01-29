<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyersTable extends Migration
{
    public function up()
    {
        Schema::create('buyers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name')->unique();
            $table->String('creditcode')->nullable();
            $table->String('ceo')->nullable();
            $table->String('tel')->nullable();
            $table->String('fax')->nullable();
            $table->String('site')->nullable();
            $table->String('address')->nullable();
            $table->integer('user_id')->unsigned()->default(0);
            $table->index('user_id');
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buyers');
    }
}
