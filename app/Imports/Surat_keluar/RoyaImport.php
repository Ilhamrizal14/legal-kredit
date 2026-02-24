<?php

namespace App\Imports\Surat_keluar;

use App\Models\Surat_keluar\Roya;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class RoyaImport implements ToCollection
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
                    'nomor_surat' => $row[1] ?? null,
                    'perihal' => $row[2] ?? null,
                    'tgl_surat' => isset($row[3]) 
                        ? ( $this->isExcelDate($row[3]) 
                        ? Date::excelToDateTimeObject($row[3])->format('Y-m-d') 
                        : (strtotime($row[3]) ? date('Y-m-d', strtotime($row[3])) : null)
                        )
                        : null,
                    'tgl_keluar' => isset($row[4]) 
                        ? ( $this->isExcelDate($row[4]) 
                        ? Date::excelToDateTimeObject($row[4])->format('Y-m-d') 
                        : (strtotime($row[4]) ? date('Y-m-d', strtotime($row[4])) : null)
                        )
                        : null,
                    'tujuan' => $row[5] ?? null,
                    'keterangan' => $row[6] ?? null,
                ];

                Roya::create($data);
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
