<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblReturnValue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('return_value', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('function_id');
            $table->string('name');
            $table->enum('data_type', ['int', 'float', 'double', 'string', 'array']);
            $table->text('description');
            $table->integer('weight');
            $table->integer('created');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \Schema::dropIfExists('return_value');
    }
}
