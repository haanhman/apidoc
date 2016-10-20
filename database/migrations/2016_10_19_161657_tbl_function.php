<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblFunction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('function', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->string('end_point');
            $table->enum('request_method',['GET','POST', 'PUT', 'DELETE']);
            $table->text('description');
            $table->text('sample_data');
            $table->integer('created');
            $table->boolean('status')->default(0);
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('function');
    }
}
