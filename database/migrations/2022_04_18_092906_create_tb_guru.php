<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbGuru extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nama_guru');
            $table->string('username_guru');
            $table->string('kelas');
            $table->string('mapel');
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
        Schema::dropIfExists('tb_guru');
    }
}
