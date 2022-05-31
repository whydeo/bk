<?php

namespace Database\Seeders;
use App\Models\banding;
use Illuminate\Database\Seeder;

class BandingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mtk1 = banding::create([
            'id' => 1,
            'kelas' => 'X',
            'jurusan' => 'REKAYASA PERANGKAT LUNAK'
        ]);
        $mtk2 = banding::create([
            'id' => 2,
            'kelas' => 'X',
            'jurusan' => 'TATABOGA'
        ]);
        $mtk3 = banding::create([
            'id' => 3,
            'kelas' => 'X',
            'jurusan' => 'BISNIS KONSTRUKSI DAN PROPERTI'
        ]);
        $mtk4 = banding::create([
            'id' => 4,
            'kelas' => 'X',
            'jurusan' => 'MULTIMEDIA'
        ]);
        $mtk5 = banding::create([
            'id' => 5,
            'kelas' => 'X',
            'jurusan' => 'TEKNIK KENDARAAN RINGAN OTOMOTIF'
        ]);
        $mtk6 = banding::create([
            'id' => 6,
            'kelas' => 'XI',
            'jurusan' => ' REKAYASA PERANGKAT LUNAK'
        ]);
        $mtk7 = banding::create([
            'id' => 7,
            'kelas' => 'XI',
            'jurusan' => 'TATABOGA'
        ]);
        $mtk8 = banding::create([
            'id' => 8,
            'kelas' => 'XI',
            'jurusan' => 'BISNIS KONSTRUKSI DAN PROPERTI'
        ]);
        $mtk9 = banding::create([
            'id' => 9,
            'kelas' => 'XI',
            'jurusan' => 'MULTIMEDIA'
        ]);
        $mtk10 = banding::create([
            'id' => 10,
            'kelas' => 'XI',
            'jurusan' => 'TEKNIK KENDARAAN RINGAN OTOMOTIF'
        ]);
        $mtk11 = banding::create([
            'id' => 11,
            'kelas' => 'XII',
            'jurusan' => 'REKAYASA PERANGKAT LUNAK'
        ]);
        $mtk12 = banding::create([
            'id' => 12,
            'kelas' => 'XII',
            'jurusan' => 'TATABOGA',
        ]);
        $mtk13 = banding::create([
            'id' => 13,
            'kelas' => 'XII',
            'jurusan' => ' BISNIS KONSTRUKSI DAN PROPERTI'
        ]);
        $mtk14 = banding::create([
            'id' => 14,
            'kelas' => 'XII',
            'jurusan' => 'MULTIMEDIA',
        ]);
        $mtk15 = banding::create([
            'id' => 15,
            'kelas' => 'XII',
            'jurusan' => 'TEKNIK KENDARAAN RINGAN OTOMOTIF',
        ]);
    }
}
