<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalPelajaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('jadwal_pelajaran', function (Blueprint $table) {
            $table->increments('id');
            $table->string('hari');
            $table->string('mulai');
            $table->string('selesai');
            // $table->integer('kegiatan_id')->nullable($value = true);
            $table->integer('kbm_id')->nullable($value = true);
            $table->integer('kelas_id');
            $table->integer('tahun_ajaran_id');
            $table->integer('semester');
            $table->integer('hari_order');
            $table->integer('created_by');
            $table->integer('updated_by');
            
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
        Schema::dropIfExists('jadwal_pelajaran');
    }
}