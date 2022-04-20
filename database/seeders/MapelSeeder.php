<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\mapel;
class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mtk1 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Matematika'
        ]);

        $mtk2 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Bahasa Indonesia'
        ]);
        $mtk3 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Produktif'
        ]);
        $mtk4 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'PJOK'
        ]);
        $mtk5 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Sejarah'
        ]);
        $mtk6 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'SisKomDig'
        ]);
        $mtk7 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Seni Budaya'
        ]);
        $mtk8 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Pendidikan Agama Kristen'
        ]);
        $mtk9 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Pendidikan Agama Katholik'
        ]);
        $mtk10 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Pendidikan Agama Islam'
        ]);
        $mtk11 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Pendidikan Agama Hindu'
        ]);
        $mtk12 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Bimbingan Konseling'
        ]);
        $mtk13 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'PPKn'
        ]);
        $mtk14 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Fisika'
        ]);
        $mtk15 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Bahasa Inggris'
        ]);
        $mtk16 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Bahasa Jawa'
        ]);
        $mtk17 = mapel::create([
            'id_kelas' => 1,
            'nama_mapel' => 'Kimia'
        ]);
        $kelas0 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Pendidikan Agama Kristen'
        ]);
        $kelas1 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Pendidikan Agama Khatolik'
        ]);
        $kelas2 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Pendidikan Agama Islam'
        ]);
        $kelas3 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Pendidikan Agama Hindu'
        ]);
        $kelas4 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Bahasa Inggris'
        ]);
        $kelas5 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Bahasa Indonesia'
        ]);
        $kelas6 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Bahasa Jawa'
        ]);
        $kelas7 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'PKWu'
        ]);
        $kelas8 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Bimbingan Konseling'
        ]);
        $kelas9 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'PJOK'
        ]);
        $kelas10 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'PPKn'
        ]);
        $kelas11 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Matematika'
        ]);
        $kelas12 = mapel::create([
            'id_kelas' => 2,
            'nama_mapel' => 'Produktif'
        ]);
    }

}
