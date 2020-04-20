<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('guru', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('nip')->default("-");
            $table->string('jabatan')->default("-");
            $table->string('pendidikan_terakhir')->default("-");
            $table->string('photo')->default("http://edulogy-cms.five-code.com/images/usr_default.png");
            $table->integer('no_hp')->default("0");
            $table->integer('sekolah_id');
            $table->integer('status_id');
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
        Schema::dropIfExists('guru');
    }
}
