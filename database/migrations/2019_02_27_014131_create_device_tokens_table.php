<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeviceTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_tokens', function(Blueprint $table)
		{
			$table->bigInteger('id', true)->unsigned();
			$table->string('udid', 150);
			$table->string('token')->default('');
			$table->enum('type', array('ios','android'))->default('ios');
			$table->bigInteger('user_id')->unsigned()->index('device_tokens_user_id_foreign');
			$table->timestamps();
			$table->softDeletes();
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('device_tokens');
    }
}
