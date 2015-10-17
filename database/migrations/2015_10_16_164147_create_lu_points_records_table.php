<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuPointsRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_points_records', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('uid');
            $table->char('userName',32)->nullable();
            $table->tinyInteger('addType')->nullable();
            $table->string('lotteryType',20)->nullable();
            $table->bigInteger('touSn')->nullable();
            $table->bigInteger('winSn')->nullable();
            $table->decimal('oldPoint',10,2);
            $table->decimal('changePoint',10,2);
            $table->decimal('newPoint',10,2);
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
		Schema::drop('lu_points_records');
	}

}
