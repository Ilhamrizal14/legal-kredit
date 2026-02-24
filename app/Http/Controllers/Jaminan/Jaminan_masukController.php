<?php

namespace App\Http\Controllers\Jaminan;

use App\Exports\Jaminan\Jaminan_masukExport;
use App\Http\Controllers\Controller;
use App\Imports\Jaminan\Jaminan_masukImport;
use App\Models\Jaminan\Jaminan_masuk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class Jaminan_masukController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_jaminan_masuk', only: ['index']),
            new Middleware('permission:view_jaminan_masuk', only: ['data']),
            new Middleware('permission:create_jaminan_masuk', only: ['import']),
            new Middleware('permission:create_jaminan_masuk', only: ['export']),
            new Middleware('permission:create_jaminan_masuk', only: ['clone']),
            new Middleware('permission:create_jaminan_masuk', only: ['store']),
            new Middleware('permission:update_jaminan_masuk', only: ['update']),
            new Middleware('permission:update_jaminan_masuk', only: ['edit']),
            new Middleware('permission:delete_jaminan_masuk', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('jaminan.jaminan_masuk.index');
    }

    public function data()
    {
        
        $jaminan_masuk = Jaminan_masuk::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($jaminan_masuk)
            ->addIndexColumn()
            ->addColumn('plafon', function ($jaminan_masuk) {
                return 'Rp. '. ($jaminan_masuk->plafon);
            })
            ->addColumn('notariil', function ($jaminan_masuk) {
                $class = $jaminan_masuk->notariil === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_masuk->notariil .'</span>';
            })
            ->addColumn('skmht', function ($jaminan_masuk) {
                $class = $jaminan_masuk->skmht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_masuk->skmht .'</span>';
            })
            ->addColumn('apht', function ($jaminan_masuk) {
                $class = $jaminan_masuk->apht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_masuk->apht .'</span>';
            })
            ->addColumn('fidusia', function ($jaminan_masuk) {
                $class = $jaminan_masuk->fidusia === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $jaminan_masuk->fidusia .'</span>';
            })
            ->addColumn('aksi', function ($jaminan_masuk) {
                
                $viewButton = auth()->user()->can('read_jaminan_masuk') 
                    ? '<button type="button" onclick="viewForm(`'. route('jaminan_masuk.show', $jaminan_masuk->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_jaminan_masuk') 
                    ? '<button type="button" onclick="editForm(`'. route('jaminan_masuk.update', $jaminan_masuk->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_jaminan_masuk')
                    ? '<button type="button" onclick="cloneForm(`'. route('jaminan_masuk.clone', $jaminan_masuk->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_jaminan_masuk') 
                    ? '<button type="button" onclick="deleteData(`'. route('jaminan_masuk.destroy', $jaminan_masuk->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            Excel::import(new Jaminan_masukImport, $request->file('file'));
    
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
        return Excel::download(new Jaminan_masukExport, 'template_jaminan_masuk.xlsx');
    }

    public function clone($id)
    {
        $jaminan_masuk = Jaminan_masuk::find($id);

        if (!$jaminan_masuk) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the jaminan_masuk data for cloning purpose
        return response()->json($jaminan_masuk);
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
            'tgl_masuk' => 'nullable|date',
            'nama' => 'nullable|string',
            'no_rekening' => 'nullable|string',
            'jenis_jaminan' => 'nullable|string',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data jaminan_masuk ke database
        $jaminan_masuk = Jaminan_masuk::create($validatedData);

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
        //         $file->storeAs('public/jaminan/jaminan_masuk', $newFileName);

        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }

        //     // Simpan nama file ke dalam kolom 'dokumentasi_db'
        //     $jaminan_masuk->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $jaminan_masuk = Jaminan_masuk::findOrFail($id);

        return response()->json($jaminan_masuk);
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
            'tgl_masuk' => 'nullable|date',
            'nama' => 'nullable|string',
            'no_rekening' => 'nullable|string',
            'jenis_jaminan' => 'nullable|string',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $jaminan_masuk = Jaminan_masuk::findOrFail($id);

        // Update data selain file
        $jaminan_masuk->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        // if ($request->hasFile('dokumentasi')) {
        //     // Hapus file lama yang sudah ada
        //     if ($jaminan_masuk->dokumentasi_db) {
        //         // Split nama file menjadi array berdasarkan koma
        //         $oldFiles = explode(',', $jaminan_masuk->dokumentasi_db);
    
        //         // Hapus setiap file lama dari storage
        //         foreach ($oldFiles as $oldFile) {
        //             $oldFilePath = storage_path('app/public/jaminan/jaminan_masuk/' . $oldFile);
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
        //         $file->storeAs('public/jaminan/jaminan_masuk', $newFileName);
    
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }
    
        //     // Update kolom 'dokumentasi_db' dengan nama file yang baru
        //     $jaminan_masuk->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $jaminan_masuk = Jaminan_masuk::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        // if ($jaminan_masuk->dokumentasi_db) {
        //     // Split nama file menjadi array berdasarkan koma
        //     $fileNames = explode(',', $jaminan_masuk->dokumentasi_db);
    
        //     // Hapus setiap file dari storage
        //     foreach ($fileNames as $fileName) {
        //         $filePath = storage_path('app/public/jaminan/jaminan_masuk/' . $fileName);
    
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Menghapus file dari server
        //         }
        //     }
        // }
    
        // Hapus record dari database
        $jaminan_masuk->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
