<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePoin4bsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poin4bs', function (Blueprint $table) {
            $table->id('id_poin');
            $table->ForeignId('id_siswa');
            $table->ForeignId('id_guru');
            $table->string('Berbudi');
            $table->string('Berkualitas');
            $table->string('Berdaya');
            $table->string('Berhasil');
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
        Schema::dropIfExists('poin4bs');
    }
}
