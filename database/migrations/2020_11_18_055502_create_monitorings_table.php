<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitorings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('kategori_tenant');
            $table->string('agenda_visit');
            $table->string('nama_tenant');
            $table->string('perusahaan_tenant');
            $table->string('alamat_tenant');
            $table->string('jabatan_tenant');
            $table->string('no_telp_tenant');
            $table->string('email_tenant');
            $table->string('jabatan_pemegang_kebijakan');
            $table->string('nama_pemegang_kebijakan');
            $table->string('minat_produk');
            $table->string('detail_minat_produk');
            $table->string('dokumentasi');
            $table->string('foto_dokumentasi');
            $table->string('cttn_peluang');
            $table->string('cttn_estimasi_revenue');
            $table->string('cttn_timeline');
            $table->string('cttn_permintaan_tenant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitorings');
    }
}
