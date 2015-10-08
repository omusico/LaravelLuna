<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuChoujiangRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_choujiang_records', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('uid');
            $table->dateTime('cjDate');
            $table->mediumInteger('buyPoint');
            $table->integer('cjNum');
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
		Schema::drop('lu_choujiang_records');
	}

}
