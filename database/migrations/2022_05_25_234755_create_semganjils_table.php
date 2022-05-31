<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemganjilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semganjils', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kelas');
            $table->string('jurusan');
            $table->string('jk');
            $table->string('n1');
            $table->string('n2');
            $table->string('n3');
            $table->string('n4');
            $table->string('n5');
            $table->string('n6');
            $table->string('n7');
            $table->string('n8');
            $table->string('n9');
            $table->string('n10');
            $table->string('n11');
            $table->string('n12');
            $table->string('n13');
            $table->string('n14');
            $table->string('n15');
            $table->string('n16');
            $table->string('n17');
            $table->string('n18');
            $table->string('n19');
            $table->string('n20');
            $table->string('n21');
            $table->string('n22');
            $table->string('n23');
            $table->string('n24');
            $table->string('n25');
            $table->string('bulan');
            $table->string('semester');
            $table->string('tahun');
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
        Schema::dropIfExists('semganjils');
    }
}
