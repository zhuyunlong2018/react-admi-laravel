<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLrMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menus', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('key')->nullable()->comment('菜单标识');
			$table->string('parent_key')->nullable()->comment('上级菜单标识');
			$table->string('local')->nullable()->comment('国际化，描述英译');
			$table->string('text')->nullable()->comment('描述');
			$table->string('target')->nullable()->comment('url跳转类别');
			$table->string('icon')->nullable()->comment('图表');
			$table->string('path')->nullable()->comment('前端路由');
			$table->string('url', 512)->nullable()->comment('浏览器跳转地址');
			$table->integer('order')->nullable()->default(1000)->comment('排序，越大越前');
			$table->integer('type')->nullable()->default(1)->comment('类型1菜单、2功能');
			$table->string('code')->nullable()->comment('编码，功能权限使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lr_menus');
	}

}
