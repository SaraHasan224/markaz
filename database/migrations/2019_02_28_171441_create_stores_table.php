<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->string('cover');
			$table->string('image');
			$table->text('address')->nullable();
			$table->text('telephone')->nullable();
			$table->string('website')->nullable();
			$table->string('emailaddress')->nullable();
			$table->longtext('tagline')->nullable();
			$table->longtext('description')->nullable();
			$table->double('latitude', 15, 8)->nullable();
            $table->double('longitude', 15, 8)->nullable();
			$table->integer('user_id')->unsigned()->index('user_user_id_foreign');
			$table->integer('category_id')->unsigned()->index('user_category_id_foreign');
            $table->integer('views')->default(1);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('stores');
    }
}
