<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('uid');
            $table->string('bankName');
            $table->string('bankCode');
            $table->char('userName',32);
            $table->integer('created');
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
		Schema::drop('lu_lottery_users');
	}

}
