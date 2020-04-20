<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEkstrakurikuler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekstrakurikuler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->text('keterangan');
            $table->string('pembina');
            $table->string('photo')->default("http://edulogy-cms.five-code.com/images/usr_default.png");
            $table->integer('sekolah_id');
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
        Schema::dropIfExists('ekstrakurikuler');
    }
}
