<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoveControlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('move_control', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('level');
            $table->string('requests_time');
            $table->string('battery');
            $table->string('error_can');
            $table->integer('status_login');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('move_control');
    }
}
