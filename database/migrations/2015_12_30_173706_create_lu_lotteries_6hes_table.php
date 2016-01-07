<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteries6hesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lotteries_6hes', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('proName');
            $table->tinyInteger('typeId')->default(0);
            $table->bigInteger('sn')->default(0);
            $table->decimal('total',10,2)->default(0.00);
            $table->tinyInteger('status')->default(0);
            $table->integer('times');
            $table->text('codes');
            $table->integer('siteId')->default(1);
            $table->decimal('eachPrice',10,2)->default(0.00);
            $table->decimal('bingoPrice',10,2)->default(0.00);
            $table->mediumInteger('uid')->default(0);
            $table->char('userName',32);
            $table->mediumInteger('recUid')->default(0);
            $table->char('userIp',15);
            $table->dateTime('endTime')->nullable();
            $table->tinyInteger('noticed')->default(0);
            $table->tinyInteger('returned')->default(0);
            $table->tinyInteger('isOpen')->default(0);
            $table->integer('dealing')->default(0)->nullable();
            $table->string('groupId',32)->default(null)->nullable();
            $table->string('province',32);
            $table->string('provinceName');
            $table->string('resultNum')->default(0);
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
		Schema::drop('lu_lotteries_6hes');
	}

}
