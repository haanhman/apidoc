<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblArugument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Schema::create('argument', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('function_id');
            $table->string('name');
            $table->enum('data_type', ['int', 'float', 'double', 'string', 'array']);
            $table->boolean('is_required')->default(1);
            $table->boolean('is_header')->default(0);
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
        \Schema::dropIfExists('argument');
    }
}
