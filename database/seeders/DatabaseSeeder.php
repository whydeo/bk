<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(kelasSeeder::class);
        $this->call(MapelSeeder::class);
    //    $this->call(KategoriSeeder::class);
        // $this->call(KasirSeeder::class);

    }
}
