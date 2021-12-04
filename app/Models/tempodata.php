<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tempodata extends Model
{
    use HasFactory;
    use HasFactory;
    public $table = 'tempodata';
    protected $fillable = [
        'id',
        'email',
        'nama',
        'alamat',
        'kodepos',
        'negara',
        'provinsi',
        'kota',
        'nohp',
        'tgllahir',
        'kategori',
        'status',
        'klasifikasi',
        'ukuran',
        'pembayaran',
        'totalpembayaran',
        'buktipembayaran'
    ];
}
