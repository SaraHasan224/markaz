<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->string('description');
			$table->timestamp('start_time');
			$table->timestamp('end_time');
            $table->Integer('radius');  //In meters
			$table->text('location');
			$table->double('longitude');
			$table->double('latitude');
            $table->string('image');
            $table->Integer('payment_status')->default(0);
            $table->bigInteger('store_id')->unsigned()->index('promotions_store_id_foreign');
            $table->bigInteger('tag_id')->unsigned()->index('promotions_tag_id_foreign');
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
        Schema::dropIfExists('promotions');
    }
}
