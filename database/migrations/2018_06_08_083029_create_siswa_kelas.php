<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaKelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('siswa_kelas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('kelas_id');
            $table->integer('tahun_ajaran_id');
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
        Schema::dropIfExists('siswa_kelas');
    }
}