<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');
        
        $resepsionis = User::create([
            'name' => 'Resepsionis',
            'email' => 'resepsionis@role.test',
            'password' => bcrypt('12345678')
        ]);

        $resepsionis->assignRole('resepsionis');

        $tamu = User::create([
                    'name' => 'Tamu',
                    'email' => 'tamu@role.test',
                    'password' => bcrypt('12345678')
                ]);

        $tamu->assignRole('tamu');

    }
}
