<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryRechargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_recharges', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('uid');
            $table->char('userName',32);
            $table->integer('siteId');
            $table->bigInteger('sn');
            $table->decimal('amounts',10,2);
            $table->integer('created');
            $table->char('type',16);
            $table->tinyInteger('status');
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
		Schema::drop('lu_lottery_recharges');
	}

}
