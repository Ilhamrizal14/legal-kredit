<?php

namespace App\Http\Controllers\Notaris;

use App\Exports\Notaris\SalinanExport;
use App\Http\Controllers\Controller;
use App\Imports\Notaris\SalinanImport;
use App\Models\Notaris\Salinan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class SalinanController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_salinan', only: ['index']),
            new Middleware('permission:view_salinan', only: ['data']),
            new Middleware('permission:create_salinan', only: ['import']),
            new Middleware('permission:create_salinan', only: ['export']),
            new Middleware('permission:create_salinan', only: ['clone']),
            new Middleware('permission:create_salinan', only: ['store']),
            new Middleware('permission:update_salinan', only: ['update']),
            new Middleware('permission:update_salinan', only: ['edit']),
            new Middleware('permission:delete_salinan', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('notaris.salinan.index');
    }

    public function data()
    {
        
        $salinan = Salinan::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($salinan)
            ->addIndexColumn()
            ->addColumn('plafon', function ($salinan) {
                return 'Rp. '. format_uang($salinan->plafon);
            })
            ->addColumn('notariil', function ($salinan) {
                $class = $salinan->notariil === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $salinan->notariil .'</span>';
            })
            ->addColumn('skmht', function ($salinan) {
                $class = $salinan->skmht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $salinan->skmht .'</span>';
            })
            ->addColumn('apht', function ($salinan) {
                $class = $salinan->apht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $salinan->apht .'</span>';
            })
            ->addColumn('fidusia', function ($salinan) {
                $class = $salinan->fidusia === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $salinan->fidusia .'</span>';
            })
            ->addColumn('aksi', function ($salinan) {
                
                $viewButton = auth()->user()->can('read_salinan') 
                    ? '<button type="button" onclick="viewForm(`'. route('salinan.show', $salinan->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_salinan') 
                    ? '<button type="button" onclick="editForm(`'. route('salinan.update', $salinan->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_salinan')
                    ? '<button type="button" onclick="cloneForm(`'. route('salinan.clone', $salinan->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_salinan') 
                    ? '<button type="button" onclick="deleteData(`'. route('salinan.destroy', $salinan->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            Excel::import(new SalinanImport, $request->file('file'));
    
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
        return Excel::download(new SalinanExport, 'template_salinan.xlsx');
    }

    public function clone($id)
    {
        $salinan = Salinan::find($id);

        if (!$salinan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the salinan data for cloning purpose
        return response()->json($salinan);
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
            'nama' => 'nullable|string',
            'plafon' => 'nullable|string',
            'notariil' => 'nullable|string',
            'skmht' => 'nullable|string',
            'apht' => 'nullable|string',
            'fidusia' => 'nullable|string',
            'notaris' => 'nullable|string',
            'tgl_realisasi' => 'nullable|date',
            'tgl_penyerahan' => 'nullable|date',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data salinan ke database
        $salinan = Salinan::create($validatedData);

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
        //         $file->storeAs('public/notaris/salinan', $newFileName);

        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }

        //     // Simpan nama file ke dalam kolom 'dokumentasi_db'
        //     $salinan->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $salinan = Salinan::findOrFail($id);

        return response()->json($salinan);
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
            'nama' => 'nullable|string',
            'plafon' => 'nullable|string',
            'notariil' => 'nullable|string',
            'skmht' => 'nullable|string',
            'apht' => 'nullable|string',
            'fidusia' => 'nullable|string',
            'notaris' => 'nullable|string',
            'tgl_realisasi' => 'nullable|date',
            'tgl_penyerahan' => 'nullable|date',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $salinan = Salinan::findOrFail($id);

        // Update data selain file
        $salinan->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        // if ($request->hasFile('dokumentasi')) {
        //     // Hapus file lama yang sudah ada
        //     if ($salinan->dokumentasi_db) {
        //         // Split nama file menjadi array berdasarkan koma
        //         $oldFiles = explode(',', $salinan->dokumentasi_db);
    
        //         // Hapus setiap file lama dari storage
        //         foreach ($oldFiles as $oldFile) {
        //             $oldFilePath = storage_path('app/public/notaris/salinan/' . $oldFile);
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
        //         $file->storeAs('public/notaris/salinan', $newFileName);
    
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }
    
        //     // Update kolom 'dokumentasi_db' dengan nama file yang baru
        //     $salinan->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $salinan = Salinan::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        // if ($salinan->dokumentasi_db) {
        //     // Split nama file menjadi array berdasarkan koma
        //     $fileNames = explode(',', $salinan->dokumentasi_db);
    
        //     // Hapus setiap file dari storage
        //     foreach ($fileNames as $fileName) {
        //         $filePath = storage_path('app/public/notaris/salinan/' . $fileName);
    
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Menghapus file dari server
        //         }
        //     }
        // }
    
        // Hapus record dari database
        $salinan->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
