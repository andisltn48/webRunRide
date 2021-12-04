<?php

namespace App\Exports;

use App\Models\tempodata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class pendaftarExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tempodata::all();
    }
    public function headings(): array
    {
        return ["id", "email", "nama",'alamat','kode pos','kota','negara','provinsi','nomor hp','tanggal lahir','status','kategori','klasifikasi','ukuran','pembayaran','total pembayaran','bukti pembayaran','created at','updated at'];
    }
}
