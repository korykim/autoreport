<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerDBsTable extends Migration
{
    public function up()
    {
        Schema::create('buyer_d_bs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('companyname');
            $table->String('ostatus')->nullable();
            $table->String('creditcode')->nullable();
            $table->String('province')->nullable();
            $table->String('city')->nullable();
            $table->String('district')->nullable();
            $table->String('owner')->nullable();
            $table->String('capital')->nullable();
            $table->String('startdate')->nullable();
            $table->String('oldname')->nullable();
            $table->String('industry')->nullable();
            $table->String('type')->nullable();
            $table->integer('personal')->nullable();
            $table->Text('scope')->nullable();
            $table->Text('address')->nullable();
            $table->Text('addresscheck')->nullable();
            $table->String('email')->nullable();
            $table->String('emailcheck')->nullable();
            $table->String('site')->nullable();
            $table->String('tel1')->nullable();
            $table->String('tel2')->nullable();
            $table->String('tel3')->nullable();
            $table->String('tel4')->nullable();
            $table->String('tel5')->nullable();
            $table->String('tel6')->nullable();
            $table->String('tel7')->nullable();



            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('buyer_d_bs');
    }
}
