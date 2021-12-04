<?php

namespace App\Exports;

use App\Models\collecteddata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class hasilExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collecteddata::all();
    }
    public function headings(): array
    {
        return ["id", "email", "nama",'alamat','kode pos','kota','negara','provinsi','kategori','klasifikasi','hasil','created at','updated at'];
    }
}
