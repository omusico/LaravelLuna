<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuUserDatasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_user_datas', function(Blueprint $table)
		{
			$table->increments('id');
            $table->mediumInteger('uid');
            $table->tinyInteger('gender')->default(0)->nullable();
            $table->char('regIp',15)->nullable();
            $table->char('loginIp',15)->nullable();
            $table->integer('loginNum')->default(0)->nullable();
            $table->text('cateAcl')->nullable();
            $table->char('openid',32)->nullable();
            $table->char('connectType',10)->nullable();
            $table->decimal('points',10,2)->default(0.00);
            $table->integer('verifyCode')->nullable();
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
		Schema::drop('lu_user_datas');
	}

}
