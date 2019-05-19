<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',150)->unique();
            $table->string('password')->bcrypt();
			$table->string('name', 150);
			$table->string('position', 150)->nullable();
			$table->string('phone_number', 150)->nullable();
			$table->string('profile_pic',80)->default('user_default.png');
            $table->string('remember_token', 100)->nullable();
            $table->text('access_token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
