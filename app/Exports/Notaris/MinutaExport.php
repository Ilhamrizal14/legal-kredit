<?php

namespace App\Exports\Notaris;

use App\Models\Notaris\Minuta;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MinutaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Minuta::select(
            'id', 
            'nama', 
            'plafon', 
            'notariil', 
            'skmht',
            'apht',
            'fidusia',
            'notaris',
            'tgl_realisasi',
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
            'KETERANGAN',
        ];
    }
}
