<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MatkulController extends Controller
{
    public function index()
    {
        return(Matkul::all());
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:matkuls,code',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 403);
        }

        $matkul = Matkul::create($request->all());

        if ($matkul) {
            $response = ["matkul" => $matkul];
            return response($response, 200);
        } else {
            $response = ["error" => "Failed Inserting"];
            return response($response, 403);
        }
    }

    public function show($id)
    {
        return Matkul::where('id', $id)->first();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|unique:matkuls,code',
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 403);
        }

        $matkul = Matkul::findOrFail($id);

        $matkul->update($request->all());

        if ($matkul) {
            $response = ["matkul" => $matkul];
            return response($response, 200);
        } else {
            $response = ["error" => "Failed Updating"];
            return response($response, 403);
        }
    }

    public function destroy($id)
    {
        //get data by id
        $matkul = Matkul::findOrFail($id);

        //delete
        $matkul->delete();
        if ($matkul) {
            $response = [
                "success" => true,
                "message" => "Matkul Deleted"
            ];
            return response($response, 200);
        } else {
            $response = ["error" => "Failed Deleting"];
            return response($response, 403);
        }

    }
}
