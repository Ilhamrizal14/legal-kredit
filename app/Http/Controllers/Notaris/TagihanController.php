<?php

namespace App\Http\Controllers\Notaris;

use App\Http\Controllers\Controller;
use App\Models\Notaris\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class TagihanController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_tagihan', only: ['index']),
            new Middleware('permission:view_tagihan', only: ['data']),
            new Middleware('permission:create_tagihan', only: ['clone']),
            new Middleware('permission:create_tagihan', only: ['store']),
            new Middleware('permission:update_tagihan', only: ['update']),
            new Middleware('permission:update_tagihan', only: ['edit']),
            new Middleware('permission:delete_tagihan', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('notaris.tagihan.index');
    }

    public function data()
    {
        
        $tagihan = Tagihan::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($tagihan)
            ->addIndexColumn()
            ->addColumn('total', function ($tagihan) {
                return 'Rp. '. format_uang($tagihan->total);
            })
            ->addColumn('notariil', function ($tagihan) {
                return 'Rp. '. format_uang($tagihan->notariil);
            })
            ->addColumn('skmht', function ($tagihan) {
                return 'Rp. '. format_uang($tagihan->skmht);
            })
            ->addColumn('apht', function ($tagihan) {
                return 'Rp. '. format_uang($tagihan->apht);
            })
            ->addColumn('fidusia', function ($tagihan) {
                return 'Rp. '. format_uang($tagihan->fidusia);
            })
            ->addColumn('aksi', function ($tagihan) {
                
                $viewButton = auth()->user()->can('read_tagihan') 
                    ? '<button type="button" onclick="viewForm(`'. route('tagihan.show', $tagihan->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_tagihan') 
                    ? '<button type="button" onclick="editForm(`'. route('tagihan.update', $tagihan->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_tagihan')
                    ? '<button type="button" onclick="cloneForm(`'. route('tagihan.clone', $tagihan->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_tagihan') 
                    ? '<button type="button" onclick="deleteData(`'. route('tagihan.destroy', $tagihan->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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

    public function clone($id)
    {
        $tagihan = Tagihan::find($id);

        if (!$tagihan) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the tagihan data for cloning purpose
        return response()->json($tagihan);
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
            'tgl_bayar' => 'nullable|date',
            'bulan_tagihan' => 'nullable|string',
            'tahun' => 'nullable|string',
            'notaris' => 'nullable|string',
            'notariil' => 'nullable|string',
            'skmht' => 'nullable|string',
            'apht' => 'nullable|string',
            'fidusia' => 'nullable|string',
            'total' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data tagihan ke database
        $tagihan = Tagihan::create($validatedData);

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
                $file->storeAs('public/notaris/tagihan', $newFileName);

                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }

            // Simpan nama file ke dalam kolom 'dokumentasi_db'
            $tagihan->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $tagihan = Tagihan::findOrFail($id);

        return response()->json($tagihan);
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
            'tgl_bayar' => 'nullable|date',
            'bulan_tagihan' => 'nullable|string',
            'tahun' => 'nullable|string',
            'notaris' => 'nullable|string',
            'notariil' => 'nullable|string',
            'skmht' => 'nullable|string',
            'apht' => 'nullable|string',
            'fidusia' => 'nullable|string',
            'total' => 'nullable|string',
            'keterangan' => 'nullable|string',
            'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $tagihan = Tagihan::findOrFail($id);

        // Update data selain file
        $tagihan->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        if ($request->hasFile('dokumentasi')) {
            // Hapus file lama yang sudah ada
            if ($tagihan->dokumentasi_db) {
                // Split nama file menjadi array berdasarkan koma
                $oldFiles = explode(',', $tagihan->dokumentasi_db);
    
                // Hapus setiap file lama dari storage
                foreach ($oldFiles as $oldFile) {
                    $oldFilePath = storage_path('app/public/notaris/tagihan/' . $oldFile);
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
                $file->storeAs('public/notaris/tagihan', $newFileName);
    
                // Simpan nama file baru ke array
                $fileNames[] = $newFileName;
            }
    
            // Update kolom 'dokumentasi_db' dengan nama file yang baru
            $tagihan->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $tagihan = Tagihan::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        if ($tagihan->dokumentasi_db) {
            // Split nama file menjadi array berdasarkan koma
            $fileNames = explode(',', $tagihan->dokumentasi_db);
    
            // Hapus setiap file dari storage
            foreach ($fileNames as $fileName) {
                $filePath = storage_path('app/public/notaris/tagihan/' . $fileName);
    
                if (file_exists($filePath)) {
                    unlink($filePath); // Menghapus file dari server
                }
            }
        }
    
        // Hapus record dari database
        $tagihan->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
