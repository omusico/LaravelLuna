<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryCompanyBanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_company_banks', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('bankName');
            $table->string('province');
            $table->string('city');
            $table->string('bankCode');
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
		Schema::drop('lu_lottery_company_banks');
	}

}
