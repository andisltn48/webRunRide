<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class collecteddata extends Model
{
    use HasFactory;
    public $table = 'collecteddata';
    protected $fillable = [
        'id',
        'email',
        'nama',
        'alamat',
        'kodepos',
        'negara',
        'provinsi',
        'kota',
        'kategori',
        'klasifikasi',
        'hasil'
    ];
}
