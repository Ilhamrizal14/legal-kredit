<?php

namespace App\Exports\Jaminan;

use App\Models\Jaminan\Tukar_sementara;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Tukar_sementaraExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Tukar_sementara::select(
            'id', 
            'no_surat', 
            'nama', 
            'no_rekening', 
            'sebenarnya',
            'yang_ditukar',
            'tgl_kembali',
            'keterangan',
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NO. SURAT',
            'NAMA',
            'NO. REKENING',
            'SEBENARNYA',
            'YANG DITUKAR',
            'TANGGAL KEMBALI',
            'KETERANGAN',
        ];
    }
}
