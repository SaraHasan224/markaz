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
			$table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 10, 8)->nullable();
			$table->integer('user_id')->unsigned()->index('user_user_id_foreign')->nullable();
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
