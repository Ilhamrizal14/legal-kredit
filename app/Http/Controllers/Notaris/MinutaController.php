<?php

namespace App\Http\Controllers\Notaris;

use App\Exports\Notaris\MinutaExport;
use App\Http\Controllers\Controller;
use App\Imports\Notaris\MinutaImport;
use App\Models\Notaris\Minuta;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class MinutaController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_minuta', only: ['index']),
            new Middleware('permission:view_minuta', only: ['data']),
            new Middleware('permission:create_minuta', only: ['import']),
            new Middleware('permission:create_minuta', only: ['export']),
            new Middleware('permission:create_minuta', only: ['clone']),
            new Middleware('permission:create_minuta', only: ['store']),
            new Middleware('permission:update_minuta', only: ['update']),
            new Middleware('permission:update_minuta', only: ['edit']),
            new Middleware('permission:delete_minuta', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('notaris.minuta.index');
    }

    public function data()
    {
        
        $minuta = Minuta::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($minuta)
            ->addIndexColumn()
            ->addColumn('plafon', function ($minuta) {
                return 'Rp. '. format_uang($minuta->plafon);
            })
            ->addColumn('notariil', function ($minuta) {
                $class = $minuta->notariil === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $minuta->notariil .'</span>';
            })
            ->addColumn('skmht', function ($minuta) {
                $class = $minuta->skmht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $minuta->skmht .'</span>';
            })
            ->addColumn('apht', function ($minuta) {
                $class = $minuta->apht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $minuta->apht .'</span>';
            })
            ->addColumn('fidusia', function ($minuta) {
                $class = $minuta->fidusia === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $minuta->fidusia .'</span>';
            })
            ->addColumn('aksi', function ($minuta) {
                
                $viewButton = auth()->user()->can('read_minuta') 
                    ? '<button type="button" onclick="viewForm(`'. route('minuta.show', $minuta->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_minuta') 
                    ? '<button type="button" onclick="editForm(`'. route('minuta.update', $minuta->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_minuta')
                    ? '<button type="button" onclick="cloneForm(`'. route('minuta.clone', $minuta->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_minuta') 
                    ? '<button type="button" onclick="deleteData(`'. route('minuta.destroy', $minuta->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            Excel::import(new MinutaImport, $request->file('file'));
    
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
        return Excel::download(new MinutaExport, 'template_minuta.xlsx');
    }

    public function clone($id)
    {
        $minuta = Minuta::find($id);

        if (!$minuta) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the minuta data for cloning purpose
        return response()->json($minuta);
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
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data minuta ke database
        $minuta = Minuta::create($validatedData);

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
        //         $file->storeAs('public/notaris/minuta', $newFileName);

        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }

        //     // Simpan nama file ke dalam kolom 'dokumentasi_db'
        //     $minuta->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $minuta = Minuta::findOrFail($id);

        return response()->json($minuta);
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
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $minuta = Minuta::findOrFail($id);

        // Update data selain file
        $minuta->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        // if ($request->hasFile('dokumentasi')) {
        //     // Hapus file lama yang sudah ada
        //     if ($minuta->dokumentasi_db) {
        //         // Split nama file menjadi array berdasarkan koma
        //         $oldFiles = explode(',', $minuta->dokumentasi_db);
    
        //         // Hapus setiap file lama dari storage
        //         foreach ($oldFiles as $oldFile) {
        //             $oldFilePath = storage_path('app/public/notaris/minuta/' . $oldFile);
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
        //         $file->storeAs('public/notaris/minuta', $newFileName);
    
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }
    
        //     // Update kolom 'dokumentasi_db' dengan nama file yang baru
        //     $minuta->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $minuta = Minuta::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        // if ($minuta->dokumentasi_db) {
        //     // Split nama file menjadi array berdasarkan koma
        //     $fileNames = explode(',', $minuta->dokumentasi_db);
    
        //     // Hapus setiap file dari storage
        //     foreach ($fileNames as $fileName) {
        //         $filePath = storage_path('app/public/notaris/minuta/' . $fileName);
    
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Menghapus file dari server
        //         }
        //     }
        // }
    
        // Hapus record dari database
        $minuta->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
