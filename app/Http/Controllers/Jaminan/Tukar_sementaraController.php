<?php

namespace App\Http\Controllers\Jaminan;

use App\Exports\Jaminan\Tukar_sementaraExport;
use App\Http\Controllers\Controller;
use App\Imports\Jaminan\Tukar_sementaraImport;
use App\Models\Jaminan\Tukar_sementara;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class Tukar_sementaraController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_tukar_sementara', only: ['index']),
            new Middleware('permission:view_tukar_sementara', only: ['data']),
            new Middleware('permission:create_tukar_sementara', only: ['import']),
            new Middleware('permission:create_tukar_sementara', only: ['export']),
            new Middleware('permission:create_tukar_sementara', only: ['clone']),
            new Middleware('permission:create_tukar_sementara', only: ['store']),
            new Middleware('permission:update_tukar_sementara', only: ['update']),
            new Middleware('permission:update_tukar_sementara', only: ['edit']),
            new Middleware('permission:delete_tukar_sementara', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('jaminan.tukar_sementara.index');
    }

    public function data()
    {
        
        $tukar_sementara = Tukar_sementara::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($tukar_sementara)
            ->addIndexColumn()
            ->addColumn('aksi', function ($tukar_sementara) {
                
                $viewButton = auth()->user()->can('read_tukar_sementara') 
                    ? '<button type="button" onclick="viewForm(`'. route('tukar_sementara.show', $tukar_sementara->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_tukar_sementara') 
                    ? '<button type="button" onclick="editForm(`'. route('tukar_sementara.update', $tukar_sementara->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_tukar_sementara')
                    ? '<button type="button" onclick="cloneForm(`'. route('tukar_sementara.clone', $tukar_sementara->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_tukar_sementara') 
                    ? '<button type="button" onclick="deleteData(`'. route('tukar_sementara.destroy', $tukar_sementara->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function import(Request $request)
    {
        try {
            // Proses impor Excel
            Excel::import(new Tukar_sementaraImport, $request->file('file'));
    
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
        return Excel::download(new Tukar_sementaraExport, 'template_tukar_sementara.xlsx');
    }


    public function clone($id)
    {
        $tukar_sementara = Tukar_sementara::find($id);

        if (!$tukar_sementara) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the tukar_sementara data for cloning purpose
        return response()->json($tukar_sementara);
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
            'no_surat' => 'nullable|string',
            'nama' => 'nullable|string',
            'no_rekening' => 'nullable|string',
            'sebenarnya' => 'nullable|string',
            'yang_ditukar' => 'nullable|string',
            'tgl_kembali' => 'nullable|string',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data tukar_sementara ke database
        $tukar_sementara = Tukar_sementara::create($validatedData);

        // Proses file jika ada
        // if ($request->hasFile('dokumentasi')) {
        //     $files = $request->file('dokumentasi');
        //     $fileNames = [];

        //     foreach ($files as $file) {
        //         $originalName = $file->getClientOriginalName(); // Nama asli file
        //         $extension = $file->getClientOriginalExtension(); // Ekstensi file

        //         // Menambahkan prefix time() sebelum no_surat file
        //         // Menambahkan prefix time() sebelum nama file
        //         $newFileName = time() . '_' . $originalName;

        //         // Simpan file di storage dengan no_surat baru
        //         // Simpan file di storage dengan nama baru
        //         $file->storeAs('public/jaminan/tukar_sementara', $newFileName);

        //         // Simpan no_surat file baru ke array
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }

        //     // Simpan no_surat file ke dalam kolom 'dokumentasi_db'
        //     // Simpan nama file ke dalam kolom 'dokumentasi_db'
        //     $tukar_sementara->update(['dokumentasi_db' => implode(',', $fileNames)]);
        // }

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
        $tukar_sementara = Tukar_sementara::findOrFail($id);

        return response()->json($tukar_sementara);
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
            'no_surat' => 'nullable|string',
            'nama' => 'nullable|string',
            'no_rekening' => 'nullable|string',
            'sebenarnya' => 'nullable|string',
            'yang_ditukar' => 'nullable|string',
            'tgl_kembali' => 'nullable|string',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $tukar_sementara = Tukar_sementara::findOrFail($id);

        // Update data selain file
        $tukar_sementara->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        // if ($request->hasFile('dokumentasi')) {
        //     // Hapus file lama yang sudah ada
        //     if ($tukar_sementara->dokumentasi_db) {
        //         // Split no_surat file menjadi array berdasarkan koma
        //         // Split nama file menjadi array berdasarkan koma
        //         $oldFiles = explode(',', $tukar_sementara->dokumentasi_db);
    
        //         // Hapus setiap file lama dari storage
        //         foreach ($oldFiles as $oldFile) {
        //             $oldFilePath = storage_path('app/public/jaminan/tukar_sementara/' . $oldFile);
        //             if (file_exists($oldFilePath)) {
        //                 unlink($oldFilePath); // Menghapus file lama
        //             }
        //         }
        //     }
    
        //     // Simpan file baru
        //     $files = $request->file('dokumentasi');
        //     $fileNames = [];
    
        //     foreach ($files as $file) {
        //         $originalName = $file->getClientOriginalName(); // Ambil no_surat asli file
        //         $originalName = $file->getClientOriginalName(); // Ambil nama asli file
        //         $extension = $file->getClientOriginalExtension(); // Ambil ekstensi file
    
        //         // Menambahkan prefix time() sebelum no_surat file
        //         // Menambahkan prefix time() sebelum nama file
        //         $newFileName = time() . '_' . $originalName;
    
        //         // Simpan file di storage dengan no_surat baru
        //         // Simpan file di storage dengan nama baru
        //         $file->storeAs('public/jaminan/tukar_sementara', $newFileName);
    
        //         // Simpan no_surat file baru ke array
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }
    
        //     // Update kolom 'dokumentasi_db' dengan no_surat file yang baru
        //     // Update kolom 'dokumentasi_db' dengan nama file yang baru
        //     $tukar_sementara->update(['dokumentasi_db' => implode(',', $fileNames)]);
        // }
    
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
        $tukar_sementara = Tukar_sementara::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        // if ($tukar_sementara->dokumentasi_db) {
        //     // Split no_surat file menjadi array berdasarkan koma
        //     // Split nama file menjadi array berdasarkan koma
        //     $fileNames = explode(',', $tukar_sementara->dokumentasi_db);
    
        //     // Hapus setiap file dari storage
        //     foreach ($fileNames as $fileName) {
        //         $filePath = storage_path('app/public/jaminan/tukar_sementara/' . $fileName);
    
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Menghapus file dari server
        //         }
        //     }
        // }
    
        // Hapus record dari database
        $tukar_sementara->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
