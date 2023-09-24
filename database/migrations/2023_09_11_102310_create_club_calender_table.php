<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClubCalenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('club_calender', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->string('time');
            $table->string('club_id');
            $table->string('user_id');
            $table->string('member_id');
            $table->string('roster_id');
            $table->string('service_id');
            $table->string('rental_id');
            $table->string('duration');
            $table->string('trainer_rate');
            $table->string('total');
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
        Schema::dropIfExists('club_calender');
    }
}
