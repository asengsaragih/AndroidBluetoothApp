<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    //the table associated with the model.
    protected $table = 'matkuls';

    //yang wahib diisi ketika insert dan update
    protected $fillable = [
        'code',
        'name'
    ];
}
