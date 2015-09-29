<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLuUserPointDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lu_user_point_details', function(Blueprint $table)
		{
			$table->increments('id');
            $table->tinyInteger('typeId')->default(null);
            $table->decimal('oldPoint',10,2)->default(null);
            $table->decimal('newPoint',10,2)->default(null);
            $table->decimal('price',10,2)->default(null);
            $table->bigInteger('sn')->default(null);
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
		Schema::drop('lu_user_point_details');
	}

}
