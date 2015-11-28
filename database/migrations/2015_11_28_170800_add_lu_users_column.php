<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLuUsersColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//打码量
        Schema::table('lu_users', function (Blueprint $table) {
//            $table->tinyInteger('depositOdds')->default(-1);
            $table->decimal('depositOdds',10,2)->default(0.00);
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
        Schema::table('lu_users', function (Blueprint $table) {
            $table->dropColumn('depositOdds');
        });
	}

}
