<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    //the table associated with the model.
    protected $table = 'jadwals';

    //yang wahib diisi ketika insert dan update
    protected $fillable = [
        'id_mahasiswa',
        'id_matkul',
        'id_dosen'
    ];
}
