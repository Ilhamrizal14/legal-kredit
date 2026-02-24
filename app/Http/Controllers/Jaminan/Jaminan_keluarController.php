<?php

namespace App\Http\Controllers\Jaminan;

use App\Exports\Jaminan\Jaminan_keluarExport;
use App\Http\Controllers\Controller;
use App\Imports\Jaminan\Jaminan_keluarImport;
use App\Models\Jaminan\Jaminan_keluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class Jaminan_keluarController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_jaminan_keluar', only: ['index']),
            new Middleware('permission:view_jaminan_keluar', only: ['data']),
            new Middleware('permission:create_jaminan_keluar', only: ['import']),
            new Middleware('permission:create_jaminan_keluar', only: ['export']),
            new Middleware('permission:create_jaminan_keluar', only: ['clone']),
            new Middleware('permission:create_jaminan_keluar', only: ['store']),
            new Middleware('permission:update_jaminan_keluar', only: ['update']),
            new Middleware('permission:update_jaminan_keluar', only: ['edit']),
            new Middleware('permission:delete_jaminan_keluar', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('jaminan.jaminan_keluar.index');
    }

    public function data()
    {
        
        $jaminan_keluar = Jaminan_keluar::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($jaminan_keluar)
            ->addIndexColumn()
            ->addColumn('plafon', function ($jaminan_keluar) {
                return 'Rp. '. ($jaminan_keluar->plafon);
            })
            ->addColumn('notariil', function ($jaminan_keluar) {
                $class = $jaminan_keluar->notariil === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_keluar->notariil .'</span>';
            })
            ->addColumn('skmht', function ($jaminan_keluar) {
                $class = $jaminan_keluar->skmht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_keluar->skmht .'</span>';
            })
            ->addColumn('apht', function ($jaminan_keluar) {
                $class = $jaminan_keluar->apht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_keluar->apht .'</span>';
            })
            ->addColumn('fidusia', function ($jaminan_keluar) {
                $class = $jaminan_keluar->fidusia === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_keluar->fidusia .'</span>';
            })
            ->addColumn('aksi', function ($jaminan_keluar) {
                
                $viewButton = auth()->user()->can('read_jaminan_keluar') 
                    ? '<button type="button" onclick="viewForm(`'. route('jaminan_keluar.show', $jaminan_keluar->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_jaminan_keluar') 
                    ? '<button type="button" onclick="editForm(`'. route('jaminan_keluar.update', $jaminan_keluar->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_jaminan_keluar')
                    ? '<button type="button" onclick="cloneForm(`'. route('jaminan_keluar.clone', $jaminan_keluar->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_jaminan_keluar') 
                    ? '<button type="button" onclick="deleteData(`'. route('jaminan_keluar.destroy', $jaminan_keluar->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            ->rawColumns(['aksi', 'notariil', 'skmht', 'apht', 'fidusia'])
            ->make(true);
    }

    public function import(Request $request)
    {
        try {
            // Proses impor Excel
            Excel::import(new Jaminan_keluarImport, $request->file('file'));
    
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
        return Excel::download(new Jaminan_keluarExport, 'template_jaminan_keluar.xlsx');
    }

    public function clone($id)
    {
        $jaminan_keluar = Jaminan_keluar::find($id);

        if (!$jaminan_keluar) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the jaminan_keluar data for cloning purpose
        return response()->json($jaminan_keluar);
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
            'tgl_keluar' => 'nullable|date',
            'nama' => 'nullable|string',
            'no_rekening' => 'nullable|string',
            'jenis_jaminan' => 'nullable|string',
            'no_registrasi' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'jumlah_jaminan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data jaminan_keluar ke database
        $jaminan_keluar = Jaminan_keluar::create($validatedData);

        // Proses file jika ada
        // if ($request->hasFile('dokumentasi')) {
        //     $files = $request->file('dokumentasi');
        //     $fileNames = [];

        //     foreach ($files as $file) {
        //         $originalName = $file->getClientOriginalName(); // Nama asli file
        //         $extension = $file->getClientOriginalExtension(); // Ekstensi file

        //         // Menambahkan prefix time() sebelum nama file
        //         $newFileName = time() . '_' . $originalName;

        //         // Simpan file di storage dengan nama baru
        //         $file->storeAs('public/jaminan/jaminan_keluar', $newFileName);

        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }

        //     // Simpan nama file ke dalam kolom 'dokumentasi_db'
        //     $jaminan_keluar->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $jaminan_keluar = Jaminan_keluar::findOrFail($id);

        return response()->json($jaminan_keluar);
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
            'tgl_keluar' => 'nullable|date',
            'nama' => 'nullable|string',
            'no_rekening' => 'nullable|string',
            'jenis_jaminan' => 'nullable|string',
            'no_registrasi' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'jumlah_jaminan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $jaminan_keluar = Jaminan_keluar::findOrFail($id);

        // Update data selain file
        $jaminan_keluar->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        // if ($request->hasFile('dokumentasi')) {
        //     // Hapus file lama yang sudah ada
        //     if ($jaminan_keluar->dokumentasi_db) {
        //         // Split nama file menjadi array berdasarkan koma
        //         $oldFiles = explode(',', $jaminan_keluar->dokumentasi_db);
    
        //         // Hapus setiap file lama dari storage
        //         foreach ($oldFiles as $oldFile) {
        //             $oldFilePath = storage_path('app/public/jaminan/jaminan_keluar/' . $oldFile);
        //             if (file_exists($oldFilePath)) {
        //                 unlink($oldFilePath); // Menghapus file lama
        //             }
        //         }
        //     }
    
        //     // Simpan file baru
        //     $files = $request->file('dokumentasi');
        //     $fileNames = [];
    
        //     foreach ($files as $file) {
        //         $originalName = $file->getClientOriginalName(); // Ambil nama asli file
        //         $extension = $file->getClientOriginalExtension(); // Ambil ekstensi file
    
        //         // Menambahkan prefix time() sebelum nama file
        //         $newFileName = time() . '_' . $originalName;
    
        //         // Simpan file di storage dengan nama baru
        //         $file->storeAs('public/jaminan/jaminan_keluar', $newFileName);
    
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }
    
        //     // Update kolom 'dokumentasi_db' dengan nama file yang baru
        //     $jaminan_keluar->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $jaminan_keluar = Jaminan_keluar::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        // if ($jaminan_keluar->dokumentasi_db) {
        //     // Split nama file menjadi array berdasarkan koma
        //     $fileNames = explode(',', $jaminan_keluar->dokumentasi_db);
    
        //     // Hapus setiap file dari storage
        //     foreach ($fileNames as $fileName) {
        //         $filePath = storage_path('app/public/jaminan/jaminan_keluar/' . $fileName);
    
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Menghapus file dari server
        //         }
        //     }
        // }
    
        // Hapus record dari database
        $jaminan_keluar->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
