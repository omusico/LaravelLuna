<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuLotteryCompanyRechargesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_lottery_company_recharges', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('siteBankId');
            $table->integer('siteId');
            $table->integer('bankId');
            $table->bigInteger('sn');
            $table->decimal('amounts',10,2);
            $table->integer('created');
            $table->char('rechargerUser',32);
            $table->tinyInteger('payType');
            $table->string('payBank')->nullable();
            $table->string('payArea')->nullable();
            $table->string('payAreaCity')->nullable();
            $table->char('payAreaType',32)->nullable();
            $table->string('payBankName')->nullable();
            $table->tinyInteger('status');
            $table->mediumInteger('uid');
            $table->char('userName',32);
            $table->tinyInteger('added');
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
		Schema::drop('lu_lottery_company_recharges');
	}

}
