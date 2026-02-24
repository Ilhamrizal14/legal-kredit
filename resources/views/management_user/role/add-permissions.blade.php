@extends('layouts.master')

@section('title')
    Edit Role Permission
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Management User / Role Management / Edit Role Permission</li>
@endsection

@section('content')

<section class="content">
    <div class="card">
        <div class="card-header">
            <span class="h4"><i class="fa fa-user-check mx-2 text-primary"></i><b class="text-primary">{{ $role->name }}</b></span>
        </div>
        <div class="card-body">
            <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                @csrf
                @method('PUT')
        
                <div class="mb-3">
                    @error('permission')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror   
        
                    <!-- Table for structured layout -->
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Permission Name</th>
                                <th class="text-center">View</th>
                                <th class="text-center">Create</th>
                                <th class="text-center">Read</th>
                                <th class="text-center">Update</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>SURAT KELUAR > ROYA</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_roya" 
                                           {{ in_array('view_roya', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_roya" 
                                           {{ in_array('create_roya', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_roya" 
                                           {{ in_array('read_roya', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_roya" 
                                           {{ in_array('update_roya', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_roya" 
                                           {{ in_array('delete_roya', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>2</td>
                                <td>SURAT KELUAR > LUNAS</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_lunas" 
                                           {{ in_array('view_lunas', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_lunas" 
                                           {{ in_array('create_lunas', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_lunas" 
                                           {{ in_array('read_lunas', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_lunas" 
                                           {{ in_array('update_lunas', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_lunas" 
                                           {{ in_array('delete_lunas', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>3</td>
                                <td>SURAT KELUAR > TIDAK DIJAMINKAN</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_tidak_dijaminkan" 
                                           {{ in_array('view_tidak_dijaminkan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_tidak_dijaminkan" 
                                           {{ in_array('create_tidak_dijaminkan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_tidak_dijaminkan" 
                                           {{ in_array('read_tidak_dijaminkan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_tidak_dijaminkan" 
                                           {{ in_array('update_tidak_dijaminkan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_tidak_dijaminkan" 
                                           {{ in_array('delete_tidak_dijaminkan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>4</td>
                                <td>SURAT KELUAR > BUKAN NASABAH</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_bukan_nasabah" 
                                           {{ in_array('view_bukan_nasabah', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_bukan_nasabah" 
                                           {{ in_array('create_bukan_nasabah', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_bukan_nasabah" 
                                           {{ in_array('read_bukan_nasabah', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_bukan_nasabah" 
                                           {{ in_array('update_bukan_nasabah', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_bukan_nasabah" 
                                           {{ in_array('delete_bukan_nasabah', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>5</td>
                                <td>SURAT KELUAR > LAIN-LAIN</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_surat_keluar_lain" 
                                           {{ in_array('view_surat_keluar_lain', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_surat_keluar_lain" 
                                           {{ in_array('create_surat_keluar_lain', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_surat_keluar_lain" 
                                           {{ in_array('read_surat_keluar_lain', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_surat_keluar_lain" 
                                           {{ in_array('update_surat_keluar_lain', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_surat_keluar_lain" 
                                           {{ in_array('delete_surat_keluar_lain', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>NOTARIS > MINUTA</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_minuta" 
                                           {{ in_array('view_minuta', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_minuta" 
                                           {{ in_array('create_minuta', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_minuta" 
                                           {{ in_array('read_minuta', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_minuta" 
                                           {{ in_array('update_minuta', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_minuta" 
                                           {{ in_array('delete_minuta', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>7</td>
                                <td>NOTARIS > SALINAN</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_salinan" 
                                           {{ in_array('view_salinan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_salinan" 
                                           {{ in_array('create_salinan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_salinan" 
                                           {{ in_array('read_salinan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_salinan" 
                                           {{ in_array('update_salinan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_salinan" 
                                           {{ in_array('delete_salinan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>8</td>
                                <td>NOTARIS > ORDER</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_order" 
                                           {{ in_array('view_order', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_order" 
                                           {{ in_array('create_order', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_order" 
                                           {{ in_array('read_order', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_order" 
                                           {{ in_array('update_order', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_order" 
                                           {{ in_array('delete_order', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>9</td>
                                <td>NOTARIS > TAGIHAN</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_tagihan" 
                                           {{ in_array('view_tagihan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_tagihan" 
                                           {{ in_array('create_tagihan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_tagihan" 
                                           {{ in_array('read_tagihan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_tagihan" 
                                           {{ in_array('update_tagihan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_tagihan" 
                                           {{ in_array('delete_tagihan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            {{-- <tr>
                                <td>10</td>
                                <td>ASURANSI > JAMKRIDA > PENJAMINAN KREDIT > POLIS</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_evaluasi_kinerja_sistem" 
                                           {{ in_array('view_evaluasi_kinerja_sistem', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_evaluasi_kinerja_sistem" 
                                           {{ in_array('create_evaluasi_kinerja_sistem', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_evaluasi_kinerja_sistem" 
                                           {{ in_array('read_evaluasi_kinerja_sistem', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_evaluasi_kinerja_sistem" 
                                           {{ in_array('update_evaluasi_kinerja_sistem', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_evaluasi_kinerja_sistem" 
                                           {{ in_array('delete_evaluasi_kinerja_sistem', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr> --}}

                            {{-- <tr>
                                <td>11</td>
                                <td>ASURANSI > JAMKRIDA > PENJAMINAN KREDIT > PREMI</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_register_ruang_server" 
                                           {{ in_array('view_register_ruang_server', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_register_ruang_server" 
                                           {{ in_array('create_register_ruang_server', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_register_ruang_server" 
                                           {{ in_array('read_register_ruang_server', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_register_ruang_server" 
                                           {{ in_array('update_register_ruang_server', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_register_ruang_server" 
                                           {{ in_array('delete_register_ruang_server', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr> --}}

                            {{-- <tr>
                                <td>12</td>
                                <td>ASURANSI > JAMKRIDA > KLAIM > PENGAJUAN</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_pelaporan_keuangan" 
                                           {{ in_array('view_pelaporan_keuangan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_pelaporan_keuangan" 
                                           {{ in_array('create_pelaporan_keuangan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_pelaporan_keuangan" 
                                           {{ in_array('read_pelaporan_keuangan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_pelaporan_keuangan" 
                                           {{ in_array('update_pelaporan_keuangan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_pelaporan_keuangan" 
                                           {{ in_array('delete_pelaporan_keuangan', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr> --}}

                            {{-- <tr>
                                <td>13</td>
                                <td>ASURANSI > JAMKRIDA > KLAIM > PENCAIRAN</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_pelaporan_pemkab" 
                                           {{ in_array('view_pelaporan_pemkab', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_pelaporan_pemkab" 
                                           {{ in_array('create_pelaporan_pemkab', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_pelaporan_pemkab" 
                                           {{ in_array('read_pelaporan_pemkab', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_pelaporan_pemkab" 
                                           {{ in_array('update_pelaporan_pemkab', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_pelaporan_pemkab" 
                                           {{ in_array('delete_pelaporan_pemkab', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr> --}}

                            <tr>
                                <td>10</td>
                                <td>JAMINAN > MASUK</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_jaminan_masuk" 
                                           {{ in_array('view_jaminan_masuk', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_jaminan_masuk" 
                                           {{ in_array('create_jaminan_masuk', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_jaminan_masuk" 
                                           {{ in_array('read_jaminan_masuk', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_jaminan_masuk" 
                                           {{ in_array('update_jaminan_masuk', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_jaminan_masuk" 
                                           {{ in_array('delete_jaminan_masuk', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>11</td>
                                <td>JAMINAN > KELUAR</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_jaminan_keluar" 
                                           {{ in_array('view_jaminan_keluar', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_jaminan_keluar" 
                                           {{ in_array('create_jaminan_keluar', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_jaminan_keluar" 
                                           {{ in_array('read_jaminan_keluar', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_jaminan_keluar" 
                                           {{ in_array('update_jaminan_keluar', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_jaminan_keluar" 
                                           {{ in_array('delete_jaminan_keluar', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>12</td>
                                <td>JAMINAN > TUKAR SEMENTARA</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_tukar_sementara" 
                                           {{ in_array('view_tukar_sementara', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_tukar_sementara" 
                                           {{ in_array('create_tukar_sementara', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_tukar_sementara" 
                                           {{ in_array('read_tukar_sementara', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_tukar_sementara" 
                                           {{ in_array('update_tukar_sementara', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_tukar_sementara" 
                                           {{ in_array('delete_tukar_sementara', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                            <tr>
                                <td>13</td>
                                <td>Management User</td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="view_management_user" 
                                           {{ in_array('view_management_user', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="create_management_user" 
                                           {{ in_array('create_management_user', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="read_management_user" 
                                           {{ in_array('read_management_user', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="update_management_user" 
                                           {{ in_array('update_management_user', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="permission[]" value="delete_management_user" 
                                           {{ in_array('delete_management_user', $rolePermissions) ? 'checked' : '' }}>
                                </td>
                            </tr>

                        </tbody>
                    </table>                    
                    
                </div>
        
                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ url('management_user/roles') }}" class="btn btn-danger mx-1">Kembali</a>
                </div>
            </form>
        </div>        
        
        
    </div>
<section>

@endsection