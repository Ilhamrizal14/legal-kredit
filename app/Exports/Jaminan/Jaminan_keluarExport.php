<?php

namespace App\Exports\Jaminan;

use App\Models\Jaminan\Jaminan_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Jaminan_keluarExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Jaminan_keluar::select(
            'id', 
            'tgl_keluar', 
            'nama', 
            'no_rekening', 
            'jenis_jaminan',
            'no_registrasi',
            'keterangan',
            'jumlah_jaminan',
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
            'NO. REGISTRASI',
            'KETERANGAN',
            'JUMLAH JAMINAN',
        ];
    }
}
