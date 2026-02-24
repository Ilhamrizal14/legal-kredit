<?php

namespace App\Exports\Jaminan;

use App\Models\Jaminan\Jaminan_masuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Jaminan_masukExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Jaminan_masuk::select(
            'id', 
            'tgl_masuk', 
            'nama', 
            'no_rekening', 
            'jenis_jaminan',
            'keterangan'
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'TANGGAL MASUK',
            'NAMA',
            'NO. REKENING',
            'JENIS JAMINAN',
            'KETERANGAN',
        ];
    }
}
