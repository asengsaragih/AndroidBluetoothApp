<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalMahasiswaController extends Controller
{

    public function getAllMahasiswaWithJadwalAndDosen()
    {
        $dataJadwal = Jadwal::all();

        $response = array();
        $response['mahasiswa'] = array();

        foreach ($dataJadwal as $data) {
            $mahasiswa = Mahasiswa::where('id', $data->id_mahasiswa)->get()->first();
            $matkul = Matkul::where('id', $data->id_matkul)->get()->first();
            $dosen = User::where('id', $data->id_dosen)->get()->first();

            $mahasiswa = [
                'nama' => $mahasiswa->name,
                'kode_matkul' => $matkul->code,
                'nama_matkul' => $matkul->name,
                'nama_dosen' => $dosen->name,
            ];

            array_push($response['mahasiswa'], $mahasiswa);
        }
        return response($response, 200);
    }

    public function getAllJadwalWithDosen()
    {
        $dataJadwal = Jadwal::all();

        $response = array();
        $response['jadwal'] = array();

        foreach ($dataJadwal as $data) {
            $matkul = Matkul::where('id', $data->id_matkul)->get()->first();
            $dosen = User::where('id', $data->id_dosen)->get()->first();

            $data = [
                'kode_matkul' => $matkul->code,
                'nama_dosen' => $dosen->name,
            ];

            array_push($response['jadwal'], $data);
        }
        return response($response, 200);
    }
}
