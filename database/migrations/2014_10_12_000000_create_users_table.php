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
            'NIK' => '11112020',
            'password' => '$2y$10$NrLwltgInseFJoBW5fbNKe38prdQXsoqiUkpPsnWSjfzTxqLhDD.W', #telproarea5fun
            'nama' => 'admin',
            'no_telf' => '081329429900', 
            'loker' => 'Telpro Area V', 
            'FM' => 'sbs', 
            'role' => 'administrator'
        ),
        array(
            'NIK' => 'admin',
            'password' => '$2y$10$Yk1qMIPwCCa9t9fSXt6FNeE/4HXMAu3z.M2j1Yuwox.lZzbR/wRWG', #telproarea5fun
            'nama' => 'admin',
            'no_telf' => '081329429900', 
            'loker' => 'Telpro Area V', 
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
