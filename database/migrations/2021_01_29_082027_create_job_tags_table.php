<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTagsTable extends Migration
{
    public function up()
    {
        Schema::create('job_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name');
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_tags');
    }
}
