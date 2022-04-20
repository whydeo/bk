<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jurusan;
class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = Jurusan::create([
            'nama_jurusan' => 'REKAYASA PERANGKAT LUNAK',
        ]);


        $xi = Jurusan::create([
            'nama_jurusan' => 'BISNIS KONSTRUKSI DAN PROPERTI',

        ]);

        $xii = Jurusan::create([
            'nama_jurusan' => 'MULTIMEDIA',
        ]);
        $xii = Jurusan::create([
            'nama_jurusan' => 'TEKNIK KENDARAAN RINGAN OTOMOTIF',
        ]);
        $xii = Jurusan::create([
            'nama_jurusan' => 'TATABOGA',
        ]);
    }
}
