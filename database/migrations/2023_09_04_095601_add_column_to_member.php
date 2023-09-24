<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->string('card_name');
            $table->string('card_no');
            $table->string('valid_date');
            $table->string('sec_code');
            $table->string('billing_zip_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->dropColumn('card_name');
            $table->dropColumn('card_no');
            $table->dropColumn('valid_date');
            $table->dropColumn('sec_code');
            $table->dropColumn('billing_zip_code');
        });
    }
}
