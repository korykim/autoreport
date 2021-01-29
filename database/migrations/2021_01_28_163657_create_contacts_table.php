<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->String('title')->unique();
            $table->integer('customer_id')->unsigned()->default(0);
            $table->index('customer_id');
            $table->integer('buyer_id')->unsigned()->default(0);
            $table->index('buyer_id');
            $table->String('to')->nullable();
            $table->text('content')->nullable();
            $table->String('options')->nullable();
            $table->String('tag')->nullable();
            $table->timestamp('totime')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
