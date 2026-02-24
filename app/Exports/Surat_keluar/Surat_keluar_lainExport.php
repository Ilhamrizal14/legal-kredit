<?php

namespace App\Exports\Surat_keluar;

use App\Models\Surat_keluar\Surat_keluar_lain;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Surat_keluar_lainExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Surat_keluar_lain::select(
            'id', 
            'nomor_surat', 
            'perihal', 
            'tgl_surat',
            'tgl_keluar',
            'tujuan', 
            'keterangan',
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NOMOR SURAT',
            'PERIHAL',
            'TANGGAL SURAT',
            'TANGGAL KELUAR',
            'TUJUAN',
            'KETERANGAN',
        ];
    }
}
