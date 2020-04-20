<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrangTuaWali extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orang_tua_wali', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('no_hp');
            $table->string('alamat');
            $table->integer('provinsi')->nullable($value = true);
            $table->integer('kabupaten')->nullable($value = true);
            $table->integer('kecamatan')->nullable($value = true);
            $table->integer('kelurahan')->nullable($value = true);
            $table->integer('kode_pos')->nullable($value = true);
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
        Schema::dropIfExists('orang_tua_wali');
    }
}
