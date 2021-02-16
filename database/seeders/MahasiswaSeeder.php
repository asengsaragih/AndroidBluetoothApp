<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mahasiswa::create([
            'nim' => '6706174098',
            'name' => 'Aldi Wahyu Saragih'
        ]);
        
        Mahasiswa::create([
            'nim' => '6706174054',
            'name' => 'Julia Anastasya'
        ]);

        Mahasiswa::create([
            'nim' => '6706174085',
            'name' => 'Wulandari Sarina'
        ]);

        Mahasiswa::create([
            'nim' => '6706174011',
            'name' => 'Rahmad Silitonga'
        ]);

        Mahasiswa::create([
            'nim' => '6706174099',
            'name' => 'Rastaysa Anri Reska'
        ]);

        Mahasiswa::create([
            'nim' => '6706174011',
            'name' => 'Lisa Hutagalung'
        ]);

        Mahasiswa::create([
            'nim' => '6706174111',
            'name' => 'Okita Melifani Reska'
        ]);

        Mahasiswa::create([
            'nim' => '6706174022',
            'name' => 'Deni'
        ]);


        Mahasiswa::create([
            'nim' => '6706174002',
            'name' => 'Guwen Sitorus'
        ]);

        Mahasiswa::create([
            'nim' => '6706174043',
            'name' => 'Detawi Nur Ashofa'
        ]);

        Mahasiswa::create([
            'nim' => '6706174032',
            'name' => 'Miki Hujassari Sinambela'
        ]);

        Mahasiswa::create([
            'nim' => '6706174021',
            'name' => 'Melisa Dwi Salwa'
        ]);
    }
}
