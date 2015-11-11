<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserreturnsColumn extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('lu_lottery_returns', function (Blueprint $table) {
            $table->string('returnDay');
        });
        DB::statement('ALTER TABLE lu_lottery_returns MODIFY COLUMN odds DECIMAL (10,3)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('lu_lottery_returns', function (Blueprint $table) {
            $table->dropColumn('returnDay');
        });
    }

}
