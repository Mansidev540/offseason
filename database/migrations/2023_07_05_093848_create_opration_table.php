<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOprationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opration', function (Blueprint $table) {
            $table->id();
            $table->string('club_id');
            $table->string('club_fee');
            $table->string('rate');
            $table->string('monday_status');
            $table->string('monday_open_time');
            $table->string('monday_close_time');
            $table->string('tuesday_status');
            $table->string('tuesday_open_time');
            $table->string('tuesday_close_time');
            $table->string('wednesday_status');
            $table->string('wednesday_open_time');
            $table->string('wednesday_close_time');
            $table->string('thursday_status');
            $table->string('thursday_open_time');
            $table->string('thursday_close_time');
            $table->string('friday_status');
            $table->string('friday_open_time');
            $table->string('friday_close_time');
            $table->string('saturday_status');
            $table->string('saturday_open_time');
            $table->string('saturday_close_time');
            $table->string('sunday_status');
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
        Schema::dropIfExists('opration');
    }
}
