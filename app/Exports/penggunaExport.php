<?php

namespace App\Exports;

use App\Models\userdataModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class penggunaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return userdataModel::all();
    }
    public function headings(): array
    {
        return ["id", "email", "nama",'alamat','kode pos','kota','negara','provinsi','nomor hp','tanggal lahir','kategori','klasifikasi','ukuran','pembayaran','total pembayaran','bukti pembayaran','created at','updated at'];

    }
}
