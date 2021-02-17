<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function getAllMahasiswaWithJadwal()
    {
        $dosenId = Auth::user()->id;

        $dataJadwal = Jadwal::where('id_dosen', $dosenId)->get();

        $response = array();
        $response['mahasiswa'] = array();

        foreach ($dataJadwal as $data) {
            $mahasiswa = Mahasiswa::where('id', $data->id_mahasiswa)->get()->first();
            $matkul = Matkul::where('id', $data->id_matkul)->get()->first();

            $mahasiswa = [
                'nama_mahasiswa' => $mahasiswa->name,
                'kode_matkul' => $matkul->code,
                'nama_matkul' => $matkul->name
            ];

            array_push($response['mahasiswa'], $mahasiswa);
        }
        return response($response, 200);
    }

    public function getAllMatkul()
    {
        $dosenId = Auth::user()->id;

        $listMatkulId = DB::table('jadwals')->select('id_matkul')->where('id_dosen', $dosenId)
        ->groupBy('id_matkul')
        ->get();

        $response = array();
        $response['mata_kuliah'] = array();

        for ($i=0; $i < count($listMatkulId); $i++) { 
            $matkul = Matkul::where('id', $listMatkulId[$i]->id_matkul)->get()->first();

            array_push($response['mata_kuliah'], $matkul);
        }

        return response($response, 200);
    }

    public function checkAuth($auth) {
        if ($auth == null) {
            $error = ["message" => 'Not Authenticate'];
            return response()->json(['error' => $error], 403);
        }
    }
}
