<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_logs', function (Blueprint $table) {
            $table->increments('id');
			$table->string('component');
			$table->string('component_name')->nullable();
			$table->string('component_image')->nullable();
			$table->string('operation');
            $table->integer('user_id')->unsigned()->index('user_user_id_foreign');
            $table->integer('store_id')->unsigned()->index('user_store_id_foreign')->nullable();
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
        Schema::dropIfExists('event_logs');
    }
}
