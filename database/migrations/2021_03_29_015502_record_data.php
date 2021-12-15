<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RecordData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_name_record')->unsigned()->nullable();
            $table->decimal('lat', 25, 6);
            $table->decimal('lng', 25, 6);
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
        Schema::dropIfExists('record_data');
    }
}
