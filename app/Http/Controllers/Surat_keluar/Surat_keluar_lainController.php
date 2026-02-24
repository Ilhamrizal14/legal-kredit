<?php

namespace App\Http\Controllers\Surat_keluar;

use App\Exports\Surat_keluar\Surat_keluar_lainExport;
use App\Http\Controllers\Controller;
use App\Imports\Surat_keluar\Surat_keluar_lainImport;
use App\Models\Surat_keluar\Surat_keluar_lain;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class Surat_keluar_lainController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_surat_keluar_lain', only: ['index']),
            new Middleware('permission:view_surat_keluar_lain', only: ['data']),
            new Middleware('permission:create_surat_keluar_lain', only: ['import']),
            new Middleware('permission:create_surat_keluar_lain', only: ['export']),
            new Middleware('permission:create_surat_keluar_lain', only: ['clone']),
            new Middleware('permission:create_surat_keluar_lain', only: ['store']),
            new Middleware('permission:update_surat_keluar_lain', only: ['update']),
            new Middleware('permission:update_surat_keluar_lain', only: ['edit']),
            new Middleware('permission:delete_surat_keluar_lain', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('surat_keluar.surat_keluar_lain.index');
    }

    public function data()
    {
        
        $surat_keluar_lain = Surat_keluar_lain::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($surat_keluar_lain)
            ->addIndexColumn()
            ->addColumn('aksi', function ($surat_keluar_lain) {
                
                $viewButton = auth()->user()->can('read_surat_keluar_lain') 
                    ? '<button type="button" onclick="viewForm(`'. route('surat_keluar_lain.show', $surat_keluar_lain->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_surat_keluar_lain') 
                    ? '<button type="button" onclick="editForm(`'. route('surat_keluar_lain.update', $surat_keluar_lain->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_surat_keluar_lain')
                    ? '<button type="button" onclick="cloneForm(`'. route('surat_keluar_lain.clone', $surat_keluar_lain->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_surat_keluar_lain') 
                    ? '<button type="button" onclick="deleteData(`'. route('surat_keluar_lain.destroy', $surat_keluar_lain->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            Excel::import(new Surat_keluar_lainImport, $request->file('file'));
    
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
        return Excel::download(new Surat_keluar_lainExport, 'template_surat_keluar_lain.xlsx');
    }

    public function clone($id)
    {
        $surat_keluar_lain = Surat_keluar_lain::find($id);

        if (!$surat_keluar_lain) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the surat_keluar_lain data for cloning purpose
        return response()->json($surat_keluar_lain);
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


        // Simpan data surat_keluar_lain ke database
        $surat_keluar_lain = Surat_keluar_lain::create($validatedData);

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
                $file->storeAs('public/surat_keluar/surat_keluar_lain', $newFileName);

                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }

            // Simpan nama file ke dalam kolom 'dokumentasi_db'
            $surat_keluar_lain->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $surat_keluar_lain = Surat_keluar_lain::findOrFail($id);

        return response()->json($surat_keluar_lain);
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
        $surat_keluar_lain = Surat_keluar_lain::findOrFail($id);

        // Update data selain file
        $surat_keluar_lain->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama yang sudah ada
            if ($surat_keluar_lain->dokumentasi_db) {
                // Split nama file menjadi array berdasarkan koma
                $oldFiles = explode(',', $surat_keluar_lain->dokumentasi_db);
    
                // Hapus setiap file lama dari storage
                foreach ($oldFiles as $oldFile) {
                    $oldFilePath = storage_path('app/public/surat_keluar/surat_keluar_lain/' . $oldFile);
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
                $file->storeAs('public/surat_keluar/surat_keluar_lain', $newFileName);
    
                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }
    
            // Update kolom 'dokumentasi_db' dengan nama file yang baru
            $surat_keluar_lain->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $surat_keluar_lain = Surat_keluar_lain::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        if ($surat_keluar_lain->dokumentasi_db) {
            // Split nama file menjadi array berdasarkan koma
            $fileNames = explode(',', $surat_keluar_lain->dokumentasi_db);
    
            // Hapus setiap file dari storage
            foreach ($fileNames as $fileName) {
                $filePath = storage_path('app/public/surat_keluar/surat_keluar_lain/' . $fileName);
    
                if (file_exists($filePath)) {
                    unlink($filePath); // Menghapus file dari server
                }
            }
        }
    
        // Hapus record dari database
        $surat_keluar_lain->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
