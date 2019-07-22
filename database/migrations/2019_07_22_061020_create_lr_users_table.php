<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLrUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name')->nullable()->comment('用户名');
			$table->string('password')->nullable()->comment('密码');
			$table->string('mobile', 12)->nullable()->comment('手机号码');
			$table->integer('age')->unsigned()->nullable()->default(0)->comment('年龄');
			$table->string('position', 128)->nullable()->comment('职位');
			$table->string('job')->nullable()->comment('工作');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lr_users');
	}

}
