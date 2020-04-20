<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaAbsen extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa_absen', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('absen_id');
            $table->integer('user_id');
            $table->integer('status_absen_id');
            $table->string('keterangan');
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
        Schema::dropIfExists('siswa_absen');
    }
}
