<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSekolah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::defaultStringLength(191);
        Schema::create('sekolah', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama')->unique();
            $table->string('tentang_sekolah');
            $table->string('alamat');
            $table->integer('provinsi')->default("33");
            $table->integer('kabupaten')->default("3217");
            $table->integer('kecamatan')->default("327303");
            $table->string('kelurahan')->default("2147483647");
            $table->integer('kode_pos')->default("0");
            $table->decimal('lat', 9, 6);
            $table->decimal('long', 9, 6);
            $table->string('logo_sekolah')->default("http://edulogy-cms.five-code.com/images/usr_default.png");
            $table->string('photo_sekolah')->default("http://edulogy-cms.five-code.com/images/usr_default.png");
            $table->string('struktur_sekolah')->default("http://edulogy-cms.five-code.com/images/usr_default.png");
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
        Schema::dropIfExists('sekolah');

    }
}


