<?php

namespace App\Http\Controllers\Surat_keluar;

use App\Exports\Surat_keluar\Tidak_dijaminkanExport;
use App\Http\Controllers\Controller;
use App\Imports\Surat_keluar\Tidak_dijaminkanImport;
use App\Models\Surat_keluar\Tidak_dijaminkan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class Tidak_dijaminkanController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_tidak_dijaminkan', only: ['index']),
            new Middleware('permission:view_tidak_dijaminkan', only: ['data']),
            new Middleware('permission:create_tidak_dijaminkan', only: ['import']),
            new Middleware('permission:create_tidak_dijaminkan', only: ['export']),
            new Middleware('permission:create_tidak_dijaminkan', only: ['clone']),
            new Middleware('permission:create_tidak_dijaminkan', only: ['store']),
            new Middleware('permission:update_tidak_dijaminkan', only: ['update']),
            new Middleware('permission:update_tidak_dijaminkan', only: ['edit']),
            new Middleware('permission:delete_tidak_dijaminkan', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('surat_keluar.tidak_dijaminkan.index');
    }

    public function data()
    {
        
        $tidak_dijaminkan = Tidak_dijaminkan::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($tidak_dijaminkan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($tidak_dijaminkan) {
                
                $viewButton = auth()->user()->can('read_tidak_dijaminkan') 
                    ? '<button type="button" onclick="viewForm(`'. route('tidak_dijaminkan.show', $tidak_dijaminkan->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_tidak_dijaminkan') 
                    ? '<button type="button" onclick="editForm(`'. route('tidak_dijaminkan.update', $tidak_dijaminkan->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_tidak_dijaminkan')
                    ? '<button type="button" onclick="cloneForm(`'. route('tidak_dijaminkan.clone', $tidak_dijaminkan->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_tidak_dijaminkan') 
                    ? '<button type="button" onclick="deleteData(`'. route('tidak_dijaminkan.destroy', $tidak_dijaminkan->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            Excel::import(new Tidak_dijaminkanImport, $request->file('file'));
    
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
        return Excel::download(new Tidak_dijaminkanExport, 'template_tidak_dijaminkan.xlsx');
    }

    public function clone($id)
    {
        $tidak_dijaminkan = Tidak_dijaminkan::find($id);

        if (!$tidak_dijaminkan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the tidak_dijaminkan data for cloning purpose
        return response()->json($tidak_dijaminkan);
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


        // Simpan data tidak_dijaminkan ke database
        $tidak_dijaminkan = Tidak_dijaminkan::create($validatedData);

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
                $file->storeAs('public/surat_keluar/tidak_dijaminkan', $newFileName);

                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }

            // Simpan nama file ke dalam kolom 'dokumentasi_db'
            $tidak_dijaminkan->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $tidak_dijaminkan = Tidak_dijaminkan::findOrFail($id);

        return response()->json($tidak_dijaminkan);
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
        $tidak_dijaminkan = Tidak_dijaminkan::findOrFail($id);

        // Update data selain file
        $tidak_dijaminkan->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama yang sudah ada
            if ($tidak_dijaminkan->dokumentasi_db) {
                // Split nama file menjadi array berdasarkan koma
                $oldFiles = explode(',', $tidak_dijaminkan->dokumentasi_db);
    
                // Hapus setiap file lama dari storage
                foreach ($oldFiles as $oldFile) {
                    $oldFilePath = storage_path('app/public/surat_keluar/tidak_dijaminkan/' . $oldFile);
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
                $file->storeAs('public/surat_keluar/tidak_dijaminkan', $newFileName);
    
                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }
    
            // Update kolom 'dokumentasi_db' dengan nama file yang baru
            $tidak_dijaminkan->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $tidak_dijaminkan = Tidak_dijaminkan::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        if ($tidak_dijaminkan->dokumentasi_db) {
            // Split nama file menjadi array berdasarkan koma
            $fileNames = explode(',', $tidak_dijaminkan->dokumentasi_db);
    
            // Hapus setiap file dari storage
            foreach ($fileNames as $fileName) {
                $filePath = storage_path('app/public/surat_keluar/tidak_dijaminkan/' . $fileName);
    
                if (file_exists($filePath)) {
                    unlink($filePath); // Menghapus file dari server
                }
            }
        }
    
        // Hapus record dari database
        $tidak_dijaminkan->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
