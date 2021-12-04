<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdataModel extends Model
{
    use HasFactory;
    public $table = 'userdata';
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
        'klasifikasi',
        'ukuran',
        'pembayaran',
        'totalpembayaran',
        'buktipembayaran'
    ];
}
