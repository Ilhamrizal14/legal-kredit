<?php

namespace App\Http\Controllers\Surat_keluar;

use App\Exports\Surat_keluar\Bukan_nasabahExport;
use App\Http\Controllers\Controller;
use App\Imports\Surat_keluar\Bukan_nasabahImport;
use App\Models\Surat_keluar\Bukan_nasabah;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class Bukan_nasabahController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_bukan_nasabah', only: ['index']),
            new Middleware('permission:view_bukan_nasabah', only: ['data']),
            new Middleware('permission:create_bukan_nasabah', only: ['import']),
            new Middleware('permission:create_bukan_nasabah', only: ['export']),
            new Middleware('permission:create_bukan_nasabah', only: ['clone']),
            new Middleware('permission:create_bukan_nasabah', only: ['store']),
            new Middleware('permission:update_bukan_nasabah', only: ['update']),
            new Middleware('permission:update_bukan_nasabah', only: ['edit']),
            new Middleware('permission:delete_bukan_nasabah', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('surat_keluar.bukan_nasabah.index');
    }

    public function data()
    {
        
        $bukan_nasabah = Bukan_nasabah::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($bukan_nasabah)
            ->addIndexColumn()
            ->addColumn('aksi', function ($bukan_nasabah) {
                
                $viewButton = auth()->user()->can('read_bukan_nasabah') 
                    ? '<button type="button" onclick="viewForm(`'. route('bukan_nasabah.show', $bukan_nasabah->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_bukan_nasabah') 
                    ? '<button type="button" onclick="editForm(`'. route('bukan_nasabah.update', $bukan_nasabah->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_bukan_nasabah')
                    ? '<button type="button" onclick="cloneForm(`'. route('bukan_nasabah.clone', $bukan_nasabah->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_bukan_nasabah') 
                    ? '<button type="button" onclick="deleteData(`'. route('bukan_nasabah.destroy', $bukan_nasabah->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
                    : '';


                return '
                <div class="btn-group">
                    '. $viewButton .'
                    '. $editButton .'
                    '. $cloneButton .'
                    '. $deleteButton .'
                </div>
                ';
            })
            ->rawColumns(['aksi', 'status'])
            ->make(true);
    }

    public function import(Request $request)
    {
        try {
            // Proses impor Excel
            Excel::import(new Bukan_nasabahImport, $request->file('file'));
    
            // Kirim respons sukses
            return response()->json([
                'status' => 'success',
                'message' => 'Data Excel berhasil diimpor!'
            ], 200);
        } catch (\Exception $e) {
            // Tangani kesalahan dan kirim respons gagal
            return response()->json([
                'status' => 'error',
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    public function export(){
        return Excel::download(new Bukan_nasabahExport, 'template_bukan_nasabah.xlsx');
    }

    public function clone($id)
    {
        $bukan_nasabah = Bukan_nasabah::find($id);

        if (!$bukan_nasabah) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the bukan_nasabah data for cloning purpose
        return response()->json($bukan_nasabah);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // 
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'nullable|string',
            'perihal' => 'nullable|string',
            'tgl_surat' => 'nullable|date',
            'tgl_keluar' => 'nullable|date',
            'tujuan' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data bukan_nasabah ke database
        $bukan_nasabah = Bukan_nasabah::create($validatedData);

        // Proses file jika ada
        if ($request->hasFile('dokumentasi')) {
            $files = $request->file('dokumentasi');
            $fileNames = [];

            foreach ($files as $file) {
                $originalName = $file->getClientOriginalName(); // Nama asli file
                $extension = $file->getClientOriginalExtension(); // Ekstensi file

                // Menambahkan prefix time() sebelum nama file
                $newFileName = time() . '_' . $originalName;

                // Simpan file di storage dengan nama baru
                $file->storeAs('public/surat_keluar/bukan_nasabah', $newFileName);

                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }

            // Simpan nama file ke dalam kolom 'dokumentasi_db'
            $bukan_nasabah->update(['dokumentasi_db' => implode(',', $fileNames)]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil ditambahkan!'
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bukan_nasabah = Bukan_nasabah::findOrFail($id);

        return response()->json($bukan_nasabah);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nomor_surat' => 'nullable|string',
            'perihal' => 'nullable|string',
            'tgl_surat' => 'nullable|date',
            'tgl_keluar' => 'nullable|date',
            'tujuan' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $bukan_nasabah = Bukan_nasabah::findOrFail($id);

        // Update data selain file
        $bukan_nasabah->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama yang sudah ada
            if ($bukan_nasabah->dokumentasi_db) {
                // Split nama file menjadi array berdasarkan koma
                $oldFiles = explode(',', $bukan_nasabah->dokumentasi_db);
    
                // Hapus setiap file lama dari storage
                foreach ($oldFiles as $oldFile) {
                    $oldFilePath = storage_path('app/public/surat_keluar/bukan_nasabah/' . $oldFile);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath); // Menghapus file lama
                    }
                }
            }
    
            // Simpan file baru
            $files = $request->file('dokumentasi');
            $fileNames = [];
    
            foreach ($files as $file) {
                $originalName = $file->getClientOriginalName(); // Ambil nama asli file
                $extension = $file->getClientOriginalExtension(); // Ambil ekstensi file
    
                // Menambahkan prefix time() sebelum nama file
                $newFileName = time() . '_' . $originalName;
    
                // Simpan file di storage dengan nama baru
                $file->storeAs('public/surat_keluar/bukan_nasabah', $newFileName);
    
                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }
    
            // Update kolom 'dokumentasi_db' dengan nama file yang baru
            $bukan_nasabah->update(['dokumentasi_db' => implode(',', $fileNames)]);
        }
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari data berdasarkan ID
        $bukan_nasabah = Bukan_nasabah::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        if ($bukan_nasabah->dokumentasi_db) {
            // Split nama file menjadi array berdasarkan koma
            $fileNames = explode(',', $bukan_nasabah->dokumentasi_db);
    
            // Hapus setiap file dari storage
            foreach ($fileNames as $fileName) {
                $filePath = storage_path('app/public/surat_keluar/bukan_nasabah/' . $fileName);
    
                if (file_exists($filePath)) {
                    unlink($filePath); // Menghapus file dari server
                }
            }
        }
    
        // Hapus record dari database
        $bukan_nasabah->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
