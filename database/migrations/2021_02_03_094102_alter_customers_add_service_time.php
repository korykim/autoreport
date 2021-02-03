<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCustomersAddServiceTime extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->Date('start')->nullable();
            $table->Date('end')->nullable();
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
}
