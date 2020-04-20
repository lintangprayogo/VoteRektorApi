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
            $table->string('nis')->unique();
            $table->string('nama');
            $table->string('nisn')->default("00000000");
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('asal_sekolah');
            $table->string('photo')->default("http://edulogy-cms.five-code.com/images/usr_default.png");
            $table->string('email')->nullable($value = true);
            $table->string('password');
            $table->integer('orang_tua_wali_id');
            $table->integer('sekolah_id');
            $table->string('angkatan');
            $table->string('status_id');
            $table->integer('created_by');
            $table->integer('updated_by');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
