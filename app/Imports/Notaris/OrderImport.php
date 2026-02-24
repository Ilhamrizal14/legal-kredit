<?php

namespace App\Imports\Notaris;

use App\Models\Notaris\Order;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class OrderImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $indexKe = 1; // Untuk melewati header

        foreach ($collection as $row) {
            // Melewati baris header (baris pertama)
            if ($indexKe > 1) {
                // Pastikan data aman dan lakukan validasi ringan
                $data = [
                    'nama' => $row[1] ?? null,
                    'plafon' => $row[2] ?? null,
                    'notariil' => $row[3] ?? 'Tidak Ada',
                    'skmht' => $row[4] ?? 'Tidak Ada',
                    'apht' => $row[5] ?? 'Tidak Ada',
                    'fidusia' => $row[6] ?? 'Tidak Ada',
                    'tgl_order' => isset($row[7]) 
                        ? ( $this->isExcelDate($row[7]) 
                            ? Date::excelToDateTimeObject($row[7])->format('Y-m-d') 
                            : (strtotime($row[7]) ? date('Y-m-d', strtotime($row[7])) : null)
                        )
                        : null,
                    'notaris' => $row[8] ?? null,
                    'keterangan' => $row[9] ?? null,
                ];

                // Simpan data hanya jika 'nama' terisi
                if (!empty($data['nama'])) {
                    Order::create($data);
                }
            }
            $indexKe++;
        }
    }

    /**
     * Check if a value is an Excel date
     *
     * @param mixed $value
     * @return bool
     */
    private function isExcelDate($value): bool
    {
        return is_numeric($value) && $value > 0;
    }
}
