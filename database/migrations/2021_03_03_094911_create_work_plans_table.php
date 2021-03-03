<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkPlansTable extends Migration
{
    public function up()
    {
        Schema::create('work_plans', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->String('jobId')->unique();
            $table->integer('customer_id')->unsigned()->default(0);
            $table->index('customer_id');
            $table->integer('buyer_id')->unsigned()->default(0);
            $table->index('buyer_id');
            $table->String('personal_name');
            $table->integer('total_Personal');
            $table->String('email');
            $table->String('tel1')->nullable();
            $table->String('tel2')->nullable();
            $table->String('site')->nullable();


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('work_plans');
    }
}
