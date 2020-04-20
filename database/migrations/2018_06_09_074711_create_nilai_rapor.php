<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiRapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_rapor', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kbm_id');
            $table->integer('ph');
            $table->integer('pts');
            $table->integer('pas');
            $table->integer('user_id');
            $table->integer('rapor_id');
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
        Schema::dropIfExists('nilai_rapor');
    }
}
