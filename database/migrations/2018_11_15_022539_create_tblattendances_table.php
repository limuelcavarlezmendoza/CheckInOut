<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblattendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblattendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id');
            $table->string('status');
            $table->string('action');
            $table->string('latitude');
            $table->string('longitude');
            $table->dateTime('device_datetime');
            $table->dateTime('server_datetime');
            $table->string('timezone');
            $table->string('remarks');
            $table->string('work_status');
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
        Schema::dropIfExists('tblattendances');
    }
}
