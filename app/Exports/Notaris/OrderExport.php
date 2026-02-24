<?php

namespace App\Exports\Notaris;

use App\Models\Notaris\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrderExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::select(
            'id', 
            'nama', 
            'plafon', 
            'notariil', 
            'skmht',
            'apht',
            'fidusia',
            'tgl_order',
            'notaris',
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
            'TANGGAL ORDER',
            'NOTARIS',
            'KETERANGAN',
        ];
    }
}
