<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryReturnsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_returns', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('siteId')->default(1);
            $table->mediumInteger('uid');
            $table->string('userName');
            $table->decimal('odds',10,2)->default(0.00);
            $table->integer('created');
            $table->decimal('amounts',10,2)->default(0.00);
            $table->mediumInteger('optUid');
            $table->string('optUser');
            $table->integer('lotId');
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
		Schema::drop('lu_lottery_returns');
	}

}
