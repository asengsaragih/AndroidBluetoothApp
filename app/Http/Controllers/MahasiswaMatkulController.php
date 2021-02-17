<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MahasiswaMatkulController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_mahasiswa' => 'required',
            'id_matkul' => 'required',
            'id_dosen' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 403);
        }

        //check if mahasiswa any data
        $mahasiswa = Mahasiswa::where('id', $request->id_mahasiswa)->get()->first();
        if ($mahasiswa == null) {
            $response = ["message" => "Mahasiswa Tidak Terdaftar"];
            return response($response, 403);
        }

        //check if matkul any data
        $matkul = Matkul::where('id', $request->id_matkul)->get()->first();
        if ($matkul == null) {
            $response = ["message" => "Matakuliah Tidak Terdaftar"];
            return response($response, 403);
        }

        //check if dosen any data
        $dosen = Dosen::where('id_dosen', $request->id_dosen)->where('id_matkul', $request->id_matkul)->get()->first();
        if ($dosen == null) {
            $response = ["message" => "Dosen tidak mengajar pada matakuliah tersebut"];
            return response($response, 403);
        }

        //validasi dan create
        $jadwal = DB::table('jadwals')
            ->where('id_mahasiswa', $request->id_mahasiswa)
            ->where('id_matkul', $request->id_matkul)
            ->where('id_dosen', $request->id_dosen)
            ->get()->first();

        if ($jadwal != null) {
            $response = ["message" => "Mahasiswa Sudah Terdaftar dikelas itu"];
            return response($response, 403);
        } else {
            $datas = DB::table('jadwals')->insert([
                'id_mahasiswa' => $request->id_mahasiswa,
                'id_matkul' => $request->id_matkul,
                'id_dosen' => $request->id_dosen,
            ]);

            $response = [
                "message" => "Berhasil menambahkan jadwal mahasiswa",
                "mahasiswa" => $datas,
            ];
            return response($response, 200);
        }
    }

    public function update(Request $request, $id_mahasiswa, $id_matkul, $id_dosen)
    {
        $validator = Validator::make($request->all(), [
            'id_matkul' => 'required',
            'id_dosen' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 403);
        }

        //check if matkul any data
        $matkul = Matkul::where('id', $request->id_matkul)->get()->first();
        if ($matkul == null) {
            $response = ["message" => "Matakuliah Tidak Terdaftar"];
            return response($response, 403);
        }

        //check if dosen any data
        $dosen = Dosen::where('id_dosen', $request->id_dosen)->where('id_matkul', $request->id_matkul)->get()->first();
        if ($dosen == null) {
            $response = ["message" => "Dosen tidak mengajar pada matakuliah tersebut"];
            return response($response, 403);
        }

        //validasi dan create
        $jadwal = DB::table('jadwals')
            ->where('id_mahasiswa', $id_mahasiswa)
            ->where('id_matkul', $id_matkul)
            ->where('id_dosen', $id_dosen)
            ->get()->first();

        if ($jadwal == null) {
            $response = ["message" => "Data tidak ada"];
            return response($response, 403);
        } else {
            $delete = DB::table('jadwals')->where([
                'id_mahasiswa' => $id_mahasiswa,
                'id_matkul' => $id_matkul,
                'id_dosen' => $id_dosen,
            ])->delete();

            if ($delete) {
                $createdAgain = DB::table('jadwals')->insert([
                    'id_mahasiswa' => $id_mahasiswa,
                    'id_matkul' => $request->id_matkul,
                    'id_dosen' => $request->id_dosen,
                ]);

                $response = [
                    "message" => "Berhasil memperbaruhi jadwal mahasiswa",
                ];
                return response($response, 200);
            }
        }
    }

    public function delete($id_mahasiswa, $id_matkul, $id_dosen)
    {
        $delete = DB::table('jadwals')->where([
            'id_mahasiswa' => $id_mahasiswa,
            'id_matkul' => $id_matkul,
            'id_dosen' => $id_dosen,
        ])->delete();

        if ($delete) {
            $response = ["message" => "Berhasil menghapus jadwal mahasiswa"];
            return response($response, 200);
        } else {
            $response = ["message" => "Parameter tidak valid"];
            return response($response, 403);
        }
    }
}
