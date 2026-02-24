<?php

namespace App\Imports\Jaminan;

use App\Models\Jaminan\Tukar_sementara;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class Tukar_sementaraImport implements ToCollection
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
                    'no_surat' => $row[1] ?? null,
                    'nama' => $row[2] ?? null,
                    'no_rekening' => $row[3] ?? null,
                    'sebenarnya' => $row[4] ?? null,
                    'yang_ditukar' => $row[5] ?? null,
                    'tgl_kembali' => isset($row[6]) 
                        ? ( $this->isExcelDate($row[6]) 
                            ? Date::excelToDateTimeObject($row[6])->format('Y-m-d') 
                            : (strtotime($row[6]) ? date('Y-m-d', strtotime($row[6])) : null)
                        )
                        : null,
                    'keterangan' => $row[7] ?? null,
                ];

                Tukar_sementara::create($data);
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
