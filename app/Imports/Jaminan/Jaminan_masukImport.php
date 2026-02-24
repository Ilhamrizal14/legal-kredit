<?php

namespace App\Imports\Jaminan;

use App\Models\Jaminan\Jaminan_masuk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Jaminan_masukImport implements ToCollection
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
                    'tgl_masuk' => isset($row[1]) 
                        ? ( $this->isExcelDate($row[1]) 
                            ? Date::excelToDateTimeObject($row[1])->format('Y-m-d') 
                            : (strtotime($row[1]) ? date('Y-m-d', strtotime($row[1])) : null)
                        )
                        : null,
                    'nama' => $row[2] ?? null,
                    'no_rekening' => $row[3] ?? null,
                    'jenis_jaminan' => $row[4] ?? null,
                    'keterangan' => $row[5] ?? null,
                ];

                Jaminan_masuk::create($data);
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
