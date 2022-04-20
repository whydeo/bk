<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $x = kelas::create([
            'kelas' => 'X',
        ]);


        $xi = kelas::create([
            'kelas' => 'XI',

        ]);

        $xii = kelas::create([
            'kelas' => 'XII',
        ]);
    }
}
