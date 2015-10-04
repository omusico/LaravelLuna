<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuUserGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_user_groups', function(Blueprint $table)
		{
			$table->increments('groupId');
			$table->char('name',32);
            $table->text('intro');
            $table->text('acls')->nullable();
            $table->tinyInteger('admin')->default(0);
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
		Schema::drop('lu_user_groups');
	}

}
