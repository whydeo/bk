<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Roles;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
     

    $admin = roles::create([
        'name' => 'bk',
        'guard_name'=>'web'
    ]);
    }
}
