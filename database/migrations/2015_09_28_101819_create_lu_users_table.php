<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_users', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name')->unique();
            $table->string('password');
            $table->tinyInteger('groupId');
            $table->string('sex')->default('')->nullable();
            $table->string('email')->default('')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->char('inSite',32)->default('-1');
            $table->char('recUser',32)->default('-1');
            $table->mediumInteger('recId')->default(0);
            $table->string('phone')->default('')->nullable();
            $table->string('realName')->default('')->nullable();
            $table->string('qq')->default('')->nullable();
            $table->string('extendUrl')->default('');
            $table->decimal('amounts',10,2)->default(0.00);
            $table->char('level',20)->default(0);
            $table->integer('lowest')->default(0);
            $table->integer('highest')->default(0);
            $table->decimal('returnOdds',10,2)->default(0.00);
            $table->string('cashPwd')->nullable();
            $table->integer('totalBuy')->default(0);
            $table->string('alipay_account')->default('');
            $table->integer('dsdx_lowest')->default(0);
            $table->integer('dsdx_highest')->default(0);
            $table->boolean('is_admin')->default(0);
            $table->integer('invite');
            $table->rememberToken();
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
		Schema::drop('lu_users');
	}

}
