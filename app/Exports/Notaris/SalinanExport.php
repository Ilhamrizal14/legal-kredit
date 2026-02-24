<?php

namespace App\Exports\Notaris;

use App\Models\Notaris\Salinan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalinanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Salinan::select(
            'id', 
            'nama', 
            'plafon', 
            'notariil', 
            'skmht',
            'apht',
            'fidusia',
            'notaris',
            'tgl_realisasi',
            'tgl_penyerahan',
            'keterangan',
        )->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'NAMA',
            'PLAFON',
            'NOTARIIL',
            'SKMHT',
            'APHT',
            'FIDUSIA',
            'NOTARIS',
            'TANGGAL REALISASI',
            'TANGGAL PENYERAHAN',
            'KETERANGAN',
        ];
    }
}
