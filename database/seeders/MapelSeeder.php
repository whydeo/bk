<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
    }
}
