<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('branch_id');
            $table->integer('employee_number');
            $table->string('fullname');
            $table->date('birthday');
            $table->string('email');
            $table->string('position');
            $table->string('employment_status');
            $table->string('civil_status');
            $table->string('device');
            $table->string('device_token');
            $table->string('device_id');
            $table->date('date_started');
            $table->string('status');
            $table->string('contact_person');
            $table->integer('contact_person_no');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
