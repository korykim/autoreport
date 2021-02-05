<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuListsTable extends Migration
{
    public function up()
    {
        Schema::create('menu_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('name')->nullable();
            $table->String('url')->nullable();
            $table->Boolean('active')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_lists');
    }
}
