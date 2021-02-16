<?php

namespace Database\Seeders;

use App\Models\Matkul;
use Illuminate\Database\Seeder;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Matkul::create([
            'code' => 'HUH1A2',
            'name' => 'Pendidikan Agama dan Etika'
        ]);

        Matkul::create([
            'code' => 'HUH1G3',
            'name' => 'Pancasila dan Kewarganegaraan'
        ]);

        Matkul::create([
            'code' => 'BAH1A3',
            'name' => 'Ekonomi Bisnis'
        ]);

        Matkul::create([
            'code' => 'BAH1E3',
            'name' => 'Matematika Bisnis'
        ]);

        Matkul::create([
            'code' => 'DUH2A2',
            'name' => 'Kewirausahaan'
        ]);

        Matkul::create([
            'code' => 'CBH3M2',
            'name' => 'Komunikasi Bisnis'
        ]);

        Matkul::create([
            'code' => 'BAH3N4',
            'name' => 'Riset Pemasaran'
        ]);

        Matkul::create([
            'code' => 'BAH4D3',
            'name' => 'Analisis Risiko Bisnis'
        ]);

        Matkul::create([
            'code' => 'BAH4B3',
            'name' => 'Bisnis Internasional'
        ]);

        Matkul::create([
            'code' => 'CBH4K6',
            'name' => 'Skripsi'
        ]);

        Matkul::create([
            'code' => 'CBH4I2',
            'name' => 'Magang'
        ]);

        Matkul::create([
            'code' => 'BAH4S4',
            'name' => 'Strategi Bisnis Ritel'
        ]);
    }
}
