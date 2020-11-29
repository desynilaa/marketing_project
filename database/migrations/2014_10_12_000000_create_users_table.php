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
            $table->string('NIK')->unique();
            $table->string('password');
            $table->string('nama' , 40);
            $table->string('no_telf', 20);
            $table->string('loker', 50);
            $table->string('FM', 25);
            $table->string('role', 15);
            $table->rememberToken();
            $table->timestamps();
            
            
        });
        DB::table('users')->insert(
        array(
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$Yk1qMIPwCCa9t9fSXt6FNeE/4HXMAu3z.M2j1Yuwox.lZzbR/wRWG', 
            'nama' => 'admin',
            'no_telf' => '081234567897', 
            'loker' => 'true', 
            'FM' => 'sbs', 
            'role' => 'administrator'
        )
    );
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
