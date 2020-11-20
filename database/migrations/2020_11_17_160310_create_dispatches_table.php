<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('property_building_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('supervisor_id');
            $table->unsignedBigInteger('houseman_id');
            $table->unsignedBigInteger('attendant_id');
            $table->unsignedBigInteger('attendant_id_two');
            $table->unsignedBigInteger('room_type_id');
            $table->date('date');
            $table->string('status');
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->string('comments')->nullable();
            $table->string('total_time');
            $table->string('budget_time');
            $table->string('variance');

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
        Schema::dropIfExists('dispatches');
    }
}