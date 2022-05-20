<?php

namespace Database\Seeders;
use App\Models\kelas;
use Illuminate\Database\Seeder;

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
