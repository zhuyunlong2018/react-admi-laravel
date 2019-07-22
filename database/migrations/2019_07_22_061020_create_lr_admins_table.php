<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLrAdminsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 128)->nullable()->comment('名称');
			$table->string('password', 128)->nullable()->comment('密码');
			$table->string('description')->nullable()->comment('描述');
			$table->integer('status')->nullable()->default(1)->comment('状态，1正常，0禁用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lr_admins');
	}

}
