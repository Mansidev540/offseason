<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_wallet', function (Blueprint $table) {
            $table->id();
            $table->string('member_id');
            $table->string('card_name');
            $table->string('card_no');
            $table->string('valid_date');
            $table->string('sec_code');
            $table->string('billing_zip_code');
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
        Schema::dropIfExists('member_wallet');
    }
}
