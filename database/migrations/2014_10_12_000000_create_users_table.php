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
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama');
            $table->string('no_telf');
            $table->string('loker');
            $table->string('FM');
            $table->string('role');
            $table->rememberToken();
            $table->timestamps();
            
            
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            
            // $table->rememberToken();
            
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
