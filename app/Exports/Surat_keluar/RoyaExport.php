<?php

namespace App\Exports\Surat_keluar;

use App\Models\Surat_keluar\Roya;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoyaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Roya::select(
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
