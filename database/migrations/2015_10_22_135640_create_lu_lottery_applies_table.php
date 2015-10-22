<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryAppliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_applies', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('uid');
            $table->char('userName',32);
            $table->integer('siteId')->default(1);
            $table->bigInteger('sn');
            $table->decimal('amounts',10,2)->default(0.00);
            $table->integer('created');
            $table->tinyInteger('status')->default(0);
            $table->integer('fees')->default(0);
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
		Schema::drop('lu_lottery_applies');
	}

}
