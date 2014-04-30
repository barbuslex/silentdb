<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeploymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deployments', function($table) {
			$table->increments('id');
			$table->string('type', 20);
			$table->string('pid', 100);
			$table->text('install');
			$table->text('uninstall');
			$table->string('download_url');
			$table->boolean('active')->default(false);
			$table->integer('version_id');
			$table->integer('user_id');
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
		Schema::drop('deployments');
	}

}
