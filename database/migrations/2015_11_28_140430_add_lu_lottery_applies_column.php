<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLuLotteryAppliesColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::table('lu_lottery_applies', function (Blueprint $table) {
            $table->string('remarks')->nullable();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::table('lu_lottery_applies', function (Blueprint $table) {
            $table->dropColumn('remarks');
        });
	}

}
