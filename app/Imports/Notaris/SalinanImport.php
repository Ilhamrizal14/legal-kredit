<?php

namespace App\Imports\Notaris;

use App\Models\Notaris\Salinan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class SalinanImport implements ToCollection
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
                    'notaris' => $row[7] ?? null,
                    'tgl_realisasi' => isset($row[8]) 
                        ? ( $this->isExcelDate($row[8]) 
                            ? Date::excelToDateTimeObject($row[8])->format('Y-m-d') 
                            : (strtotime($row[8]) ? date('Y-m-d', strtotime($row[8])) : null)
                        )
                        : null,
                    'tgl_penyerahan' => isset($row[9]) 
                        ? ( $this->isExcelDate($row[9]) 
                            ? Date::excelToDateTimeObject($row[9])->format('Y-m-d') 
                            : (strtotime($row[9]) ? date('Y-m-d', strtotime($row[9])) : null)
                        )
                        : null,
                    'keterangan' => $row[10] ?? null,
                ];

                // Simpan data hanya jika 'nama' terisi
                if (!empty($data['nama'])) {
                    Salinan::create($data);
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
