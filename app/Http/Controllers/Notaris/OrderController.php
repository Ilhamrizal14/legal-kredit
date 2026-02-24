<?php

namespace App\Http\Controllers\Notaris;

use App\Exports\Notaris\OrderExport;
use App\Http\Controllers\Controller;
use App\Imports\Notaris\OrderImport;
use App\Models\Notaris\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller implements HasMiddleware
{
    public static function middleware(): array 
    {
        return [
            new Middleware('permission:view_order', only: ['index']),
            new Middleware('permission:view_order', only: ['data']),
            new Middleware('permission:create_order', only: ['import']),
            new Middleware('permission:create_order', only: ['export']),
            new Middleware('permission:create_order', only: ['clone']),
            new Middleware('permission:create_order', only: ['store']),
            new Middleware('permission:update_order', only: ['update']),
            new Middleware('permission:update_order', only: ['edit']),
            new Middleware('permission:delete_order', only: ['destroy']),
        ];
    }

    public function index()
    {
        
        return view('notaris.order.index');
    }

    public function data()
    {
        
        $order = Order::orderBy('created_at', 'desc')->get();


        return datatables()
            ->of($order)
            ->addIndexColumn()
            ->addColumn('plafon', function ($order) {
                return 'Rp. '. format_uang($order->plafon);
            })
            ->addColumn('notariil', function ($order) {
                $class = $order->notariil === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $order->notariil .'</span>';
            })
            ->addColumn('skmht', function ($order) {
                $class = $order->skmht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $order->skmht .'</span>';
            })
            ->addColumn('apht', function ($order) {
                $class = $order->apht === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $order->apht .'</span>';
            })
            ->addColumn('fidusia', function ($order) {
                $class = $order->fidusia === 'Tidak Ada' ? 'badge badge-danger' : 'badge badge-success';
                return '<span class="'. $class .' text-xs font-weight-normal">'. $order->fidusia .'</span>';
            })
            ->addColumn('aksi', function ($order) {
                
                $viewButton = auth()->user()->can('read_order') 
                    ? '<button type="button" onclick="viewForm(`'. route('order.show', $order->id) .'`)" class="btn btn-warning"><i class="fa fa-eye"></i></button>' 
                    : '';
                
                    
                $editButton = auth()->user()->can('update_order') 
                    ? '<button type="button" onclick="editForm(`'. route('order.update', $order->id) .'`)" class="btn btn-primary"><i class="fa fa-pen"></i></button>' 
                    : '';
                    
                $cloneButton = auth()->user()->can('update_order')
                    ? '<button type="button" onclick="cloneForm(`'. route('order.clone', $order->id) .'`)" class="btn btn-success"><i class="fa fa-copy"></i></button>' 
                    : '';

                $deleteButton = auth()->user()->can('delete_order') 
                    ? '<button type="button" onclick="deleteData(`'. route('order.destroy', $order->id) .'`)" class="btn btn-danger"><i class="fa fa-trash"></i></button>' 
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
            Excel::import(new OrderImport, $request->file('file'));
    
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
        return Excel::download(new OrderExport, 'template_order.xlsx');
    }

    public function clone($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        // Return the order data for cloning purpose
        return response()->json($order);
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
            'tgl_order' => 'nullable|date',
            'notaris' => 'nullable|string',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);


        // Simpan data order ke database
        $order = Order::create($validatedData);

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
        //         $file->storeAs('public/notaris/order', $newFileName);

        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }

        //     // Simpan nama file ke dalam kolom 'dokumentasi_db'
        //     $order->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $order = Order::findOrFail($id);

        return response()->json($order);
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
            'tgl_order' => 'nullable|date',
            'notaris' => 'nullable|string',
            'keterangan' => 'nullable|string',
            // 'dokumentasi.*' => 'nullable|file|max:10240',
        ]);

        // Cari data berdasarkan ID
        $order = Order::findOrFail($id);

        // Update data selain file
        $order->update($validatedData);
    
        // Proses jika ada file baru yang diunggah
        // if ($request->hasFile('dokumentasi')) {
        //     // Hapus file lama yang sudah ada
        //     if ($order->dokumentasi_db) {
        //         // Split nama file menjadi array berdasarkan koma
        //         $oldFiles = explode(',', $order->dokumentasi_db);
    
        //         // Hapus setiap file lama dari storage
        //         foreach ($oldFiles as $oldFile) {
        //             $oldFilePath = storage_path('app/public/notaris/order/' . $oldFile);
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
        //         $file->storeAs('public/notaris/order', $newFileName);
    
        //         // Simpan nama file baru ke array
        //         $fileNames[] = $newFileName;
        //     }
    
        //     // Update kolom 'dokumentasi_db' dengan nama file yang baru
        //     $order->update(['dokumentasi_db' => implode(',', $fileNames)]);
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
        $order = Order::findOrFail($id);
    
        // Hapus file-file yang terasosiasi jika ada
        // if ($order->dokumentasi_db) {
        //     // Split nama file menjadi array berdasarkan koma
        //     $fileNames = explode(',', $order->dokumentasi_db);
    
        //     // Hapus setiap file dari storage
        //     foreach ($fileNames as $fileName) {
        //         $filePath = storage_path('app/public/notaris/order/' . $fileName);
    
        //         if (file_exists($filePath)) {
        //             unlink($filePath); // Menghapus file dari server
        //         }
        //     }
        // }
    
        // Hapus record dari database
        $order->delete();
    
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus!'
        ]);
    }
}
