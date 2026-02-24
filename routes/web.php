<?php

use App\Http\Controllers\Jaminan\Jaminan_keluarController;
use App\Http\Controllers\Jaminan\Jaminan_masukController;
use App\Http\Controllers\Jaminan\Tukar_sementaraController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Management User
use App\Http\Controllers\Management_user\PermissionController;
use App\Http\Controllers\Management_user\RoleController;
use App\Http\Controllers\Management_user\UserController;

//Layouts
use App\Http\Controllers\Layouts\ProfilController;
use App\Http\Controllers\Notaris\MinutaController;
use App\Http\Controllers\Notaris\OrderController;
use App\Http\Controllers\Notaris\SalinanController;
use App\Http\Controllers\Notaris\TagihanController;
use App\Http\Controllers\Surat_keluar\Bukan_nasabahController;
use App\Http\Controllers\Surat_keluar\LunasController;
use App\Http\Controllers\Surat_keluar\RoyaController;
use App\Http\Controllers\Surat_keluar\Surat_keluar_lainController;
use App\Http\Controllers\Surat_keluar\Tidak_dijaminkanController;
use App\Models\Jaminan\Tukar_sementara;
use App\Models\Surat_keluar\Bukan_nasabah;
use App\Models\Surat_keluar\Surat_keluar_lain;

Route::group(['middleware' => 'auth'], function() {
    
    Route::group([], function () { //Surat Keluar > ROYA
        Route::get('/roya/data', [RoyaController::class, 'data'])->name('roya.data');
        Route::post('/roya/import', [RoyaController::class, 'import'])->name('roya.import');
        Route::get('/roya/export', [RoyaController::class, 'export'])->name('roya.export');
        Route::get('roya/clone/{id}', [RoyaController::class, 'clone'])->name('roya.clone');
        Route::resource('surat_keluar/roya', RoyaController::class);
    });   

    Route::group([], function () { //Surat Keluar > Lunas
        Route::get('/lunas/data', [LunasController::class, 'data'])->name('lunas.data');
        Route::post('/lunas/import', [LunasController::class, 'import'])->name('lunas.import');
        Route::get('/lunas/export', [LunasController::class, 'export'])->name('lunas.export');
        Route::get('lunas/clone/{id}', [LunasController::class, 'clone'])->name('lunas.clone');
        Route::resource('surat_keluar/lunas', LunasController::class);
    });   

    Route::group([], function () { //Surat Keluar > Bukan Nasabah
        Route::get('/bukan_nasabah/data', [Bukan_nasabahController::class, 'data'])->name('bukan_nasabah.data');
        Route::post('/bukan_nasabah/import', [Bukan_nasabahController::class, 'import'])->name('bukan_nasabah.import');
        Route::get('/bukan_nasabah/export', [Bukan_nasabahController::class, 'export'])->name('bukan_nasabah.export');
        Route::get('bukan_nasabah/clone/{id}', [Bukan_nasabahController::class, 'clone'])->name('bukan_nasabah.clone');
        Route::resource('surat_keluar/bukan_nasabah', Bukan_nasabahController::class);
    });

    Route::group([], function () { //Surat Keluar > Tidak Dijaminkan
        Route::get('/tidak_dijaminkan/data', [Tidak_dijaminkanController::class, 'data'])->name('tidak_dijaminkan.data');
        Route::post('/tidak_dijaminkan/import', [Tidak_dijaminkanController::class, 'import'])->name('tidak_dijaminkan.import');
        Route::get('/tidak_dijaminkan/export', [Tidak_dijaminkanController::class, 'export'])->name('tidak_dijaminkan.export');
        Route::get('tidak_dijaminkan/clone/{id}', [Tidak_dijaminkanController::class, 'clone'])->name('tidak_dijaminkan.clone');
        Route::resource('surat_keluar/tidak_dijaminkan', Tidak_dijaminkanController::class);
    });   

    Route::group([], function () { //Surat Keluar > Surat Keluar Lain
        Route::get('/surat_keluar_lain/data', [Surat_keluar_lainController::class, 'data'])->name('surat_keluar_lain.data');
        Route::post('/surat_keluar_lain/import', [Surat_keluar_lainController::class, 'import'])->name('surat_keluar_lain.import');
        Route::get('/surat_keluar_lain/export', [Surat_keluar_lainController::class, 'export'])->name('surat_keluar_lain.export');
        Route::get('surat_keluar_lain/clone/{id}', [Surat_keluar_lainController::class, 'clone'])->name('surat_keluar_lain.clone');
        Route::resource('surat_keluar/surat_keluar_lain', Surat_keluar_lainController::class);
    });
    
    Route::group([], function () { //Notaris > Minuta
        Route::get('/minuta/data', [MinutaController::class, 'data'])->name('minuta.data');
        Route::post('/minuta/import', [MinutaController::class, 'import'])->name('minuta.import');
        Route::get('/minuta/export', [MinutaController::class, 'export'])->name('minuta.export');
        Route::get('minuta/clone/{id}', [MinutaController::class, 'clone'])->name('minuta.clone');
        Route::resource('notaris/minuta', MinutaController::class);
    });
    
    Route::group([], function () { //Notaris > Salinan
        Route::get('/salinan/data', [SalinanController::class, 'data'])->name('salinan.data');
        Route::post('/salinan/import', [SalinanController::class, 'import'])->name('salinan.import');
        Route::get('/salinan/export', [SalinanController::class, 'export'])->name('salinan.export');
        Route::get('salinan/clone/{id}', [SalinanController::class, 'clone'])->name('salinan.clone');
        Route::resource('notaris/salinan', SalinanController::class);
    });
    
    Route::group([], function () { //Notaris > Order
        Route::get('/order/data', [OrderController::class, 'data'])->name('order.data');
        Route::post('/order/import', [OrderController::class, 'import'])->name('order.import');
        Route::get('/order/export', [OrderController::class, 'export'])->name('order.export');
        Route::get('order/clone/{id}', [OrderController::class, 'clone'])->name('order.clone');
        Route::resource('notaris/order', OrderController::class);
    });

    Route::group([], function () { //Notaris > Tagihan
        Route::get('/tagihan/data', [TagihanController::class, 'data'])->name('tagihan.data');
        Route::get('tagihan/clone/{id}', [TagihanController::class, 'clone'])->name('tagihan.clone');
        Route::resource('notaris/tagihan', TagihanController::class);
    });

    Route::group([], function () { //Jaminan > Jaminan Masuk
        Route::get('/jaminan_masuk/data', [Jaminan_masukController::class, 'data'])->name('jaminan_masuk.data');
        Route::post('/jaminan_masuk/import', [Jaminan_masukController::class, 'import'])->name('jaminan_masuk.import');
        Route::get('/jaminan_masuk/export', [Jaminan_masukController::class, 'export'])->name('jaminan_masuk.export');
        Route::get('jaminan_masuk/clone/{id}', [Jaminan_masukController::class, 'clone'])->name('jaminan_masuk.clone');
        Route::resource('jaminan/jaminan_masuk', Jaminan_masukController::class);
    });

    Route::group([], function () { //Jaminan > Jaminan Masuk
        Route::get('/jaminan_keluar/data', [Jaminan_keluarController::class, 'data'])->name('jaminan_keluar.data');
        Route::post('/jaminan_keluar/import', [Jaminan_keluarController::class, 'import'])->name('jaminan_keluar.import');
        Route::get('/jaminan_keluar/export', [Jaminan_keluarController::class, 'export'])->name('jaminan_keluar.export');
        Route::get('jaminan_keluar/clone/{id}', [Jaminan_keluarController::class, 'clone'])->name('jaminan_keluar.clone');
        Route::resource('jaminan/jaminan_keluar', Jaminan_keluarController::class);
    });

    Route::group([], function () { //Jaminan > Tukar Sementara
        Route::get('/tukar_sementara/data', [Tukar_sementaraController::class, 'data'])->name('tukar_sementara.data');
        Route::post('/tukar_sementara/import', [Tukar_sementaraController::class, 'import'])->name('tukar_sementara.import');
        Route::get('/tukar_sementara/export', [Tukar_sementaraController::class, 'export'])->name('tukar_sementara.export');
        Route::get('tukar_sementara/clone/{id}', [Tukar_sementaraController::class, 'clone'])->name('tukar_sementara.clone');
        Route::resource('jaminan/tukar_sementara', Tukar_sementaraController::class);
    });

    Route::group([], function () { //Management User
        Route::resource('management_user/permission', PermissionController::class);
        Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
        
        Route::resource('management_user/roles', RoleController::class);
        Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
        Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
        Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
        
        Route::resource('management_user/users', UserController::class);
        Route::get('users/{userId}/delete', [UserController::class, 'destroy']);
        
        Route::get('management_user/profil', [ProfilController::class, 'index'])->name('layouts.profil');
        Route::put('management_user/profil', [ProfilController::class, 'updateProfile'])->name('profil.update');
    }); 
    
    Route::get('/beranda', function () { return view('layouts.beranda'); })->name('beranda');

    Route::middleware(['auth'])->group(function () {
        Route::get('/beranda', function () { return view('layouts.beranda'); })->name('beranda');
    });

    });

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('beranda');
    }
    return redirect()->route('login');
});

require __DIR__.'/auth.php';
