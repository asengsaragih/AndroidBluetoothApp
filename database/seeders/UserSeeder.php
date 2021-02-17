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
            'nip' => '103041639870',
            'name' => 'Admin Developer',
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        $admin->assignRole('admin');

        $dosen = User::create([
            'nip' => '103041639871',
            'name' => 'Dosen Developer',
            'username' => 'dosen',
            'password' => bcrypt('dosen'),
        ]);

        $dosen->assignRole('dosen');

        $dosen = User::create([
            'nip' => '103041639872',
            'name' => 'Dosen Pemasaran',
            'username' => 'dosenpemasaran',
            'password' => bcrypt('dosen'),
        ]);

        $dosen->assignRole('dosen');
    }
}
