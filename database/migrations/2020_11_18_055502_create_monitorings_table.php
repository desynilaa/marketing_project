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
            $table->string('username', 50);
            $table->string('kategori_tenant', 25);
            $table->string('agenda_visit', 50);
            $table->string('nama_tenant', 100);
            $table->string('perusahaan_tenant', 60);
            $table->string('alamat_tenant');
            $table->string('jabatan_tenant', 50);
            $table->string('no_telp_tenant', 20);
            $table->string('email_tenant', 60);
            $table->string('jabatan_pemegang_kebijakan', 15);
            $table->string('nama_pemegang_kebijakan');
            $table->string('minat_produk', 25);
            $table->string('detail_minat_produk');
            $table->string('dokumentasi', 30);
            $table->string('foto_dokumentasi');
            $table->longtext('cttn_peluang');
            $table->longtext('cttn_estimasi_revenue');
            $table->longtext('cttn_timeline');
            $table->longtext('cttn_permintaan_tenant');
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
