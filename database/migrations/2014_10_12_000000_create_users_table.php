<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar')->default('avatar.jpg');
            $table->string('fullname');
            $table->string('phone', 25);
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->bigInteger('office_id')->unsigned();
            $table->bigInteger('position_id')->unsigned(); 
            $table->tinyInteger('active')->default(0)->index();
            $table->timestamps();
            $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
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
