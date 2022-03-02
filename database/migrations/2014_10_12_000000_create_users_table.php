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
            $table->enum('role', ['user', 'admin'])->default('user');
            $table->string('f_name')->nullable();
            $table->string('l_name')->nullable();
            $table->date('dob')->nullable();
            $table->integer('country_code')->default('+91');
            $table->string('contact_no', 13)->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('email');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('description')->nullable();
            $table->dateTime('activity');
            $table->rememberToken();
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
