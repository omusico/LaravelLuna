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
            $table->tinyInteger('gender')->default(0);
            $table->char('regIp',15);
            $table->char('loginIp',15);
            $table->integer('loginNum')->default(0);
            $table->text('cateAcl');
            $table->char('openid',32);
            $table->char('connectType',10);
            $table->decimal('points',10,2)->default(0.00);
            $table->integer('verifyCode');
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
