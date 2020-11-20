<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('property_type_id');
            $table->unsignedBigInteger('property_brand_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('room_type_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('attendant_id');
            $table->unsignedBigInteger('inspector_id');
            $table->unsignedBigInteger('houseman_id');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('property_building_id');

            $table->string('comments')->nullable();
            $table->integer('status')->default(0);
            $table->dateTime('time_in');
            $table->dateTime('time_out');


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
        Schema::dropIfExists('schedules');
    }
}