<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('support', function (Blueprint $table) {
            $table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
            $table->integer('store_id')->unsigned(); 
            $table->foreign('store_id')->references('id')->on('stores');
			$table->string('subject',255);
			$table->string('email',70);
			$table->text('description');
			$table->text('response')->nullable(); 
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
        Schema::dropIfExists('support');
    }
}
