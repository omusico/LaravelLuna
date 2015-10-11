<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteriesResultsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lotteries_results', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('proName');
            $table->string('typeName',30);
            $table->string('codes');
            $table->integer('created');
            $table->text('tjData');
            $table->string('source',20);
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
		Schema::drop('lu_lotteries_results');
	}

}
