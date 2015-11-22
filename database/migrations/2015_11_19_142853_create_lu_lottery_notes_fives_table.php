<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryNotesFivesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_notes_fives', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('dateSn');
            $table->string('proName');
            $table->integer('siteId')->default(1);
            $table->string('code');
            $table->integer('typeId')->default(1);
            $table->integer('sumVal')->default(0);
            $table->decimal('amount',10,2)->default(0.00);
            $table->decimal('bingoPrice',10,2)->default(0.00);
            $table->mediumInteger('uid');
            $table->char('userName',32);
            $table->integer('created');
            $table->tinyInteger('status');
            $table->bigInteger('lotSn')->nullable();
            $table->string('province')->nullable();
            $table->string('provinceName')->nullable();
            $table->string('resultNum')->nullable();
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
		Schema::drop('lu_lottery_notes_fives');
	}

}
