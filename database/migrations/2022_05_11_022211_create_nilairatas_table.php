<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilairatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilairatas', function (Blueprint $table) {
            $table->id('id_nilai');
            // $table->ForeignId('id_nilaiawal');
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('rata_rata');
            $table->string('keterangan');
            $table->string('folowup');
            $table->string('bulan');
            $table->string('kategori');
            $table->string('penilai');
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
        Schema::dropIfExists('nilairatas');
    }
}
