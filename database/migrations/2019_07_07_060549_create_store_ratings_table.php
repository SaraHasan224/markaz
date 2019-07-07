<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_rating', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('rating');
            $table->integer('user_id')->unsigned()->index('user_user_id_foreign');
            $table->integer('store_id')->unsigned()->index('user_store_id_foreign');
            $table->timestamps();
        });
        Schema::create('promotion_rating', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('rating');
            $table->integer('user_id')->unsigned()->index('user_user_id_foreign');
            $table->integer('promotion_id')->unsigned()->index('user_promotion_id_foreign');
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
        Schema::dropIfExists('store_rating');
        Schema::dropIfExists('promotion_rating');
    }
}
