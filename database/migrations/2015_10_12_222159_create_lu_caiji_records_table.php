<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuCaijiRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_caiji_records', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('lotterytype',20);
            $table->char('period',32);
            $table->integer('useTime');
            $table->integer('status');
            $table->text('msg');
            $table->integer('fdTime')->default(0)->nullable();
            $table->integer('created');
            $table->dateTime('createdTime');
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
		Schema::drop('lu_caiji_records');
	}

}
