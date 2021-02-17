<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    //the table associated with the model.
    protected $table = 'dosens';

    //yang wahib diisi ketika insert dan update
    protected $fillable = [
        'id_matkul',
        'id_dosen'
    ];
}
