<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKbm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    /*pengajar adalah staff pengajar dimana datanya mengacu pada pelajaran dan guru*/
    public function up()
    {
        Schema::create('kbm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tahun_ajaran_id');
            $table->integer('semester');
            $table->integer('pelajaran_id');
            $table->integer('guru_id');
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
        Schema::dropIfExists('kbm');
    }
}
