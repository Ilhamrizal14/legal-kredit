<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('beranda') }}" class="brand-link">
        <img src="{{ asset('assets/dist/img/legal_kredit.png')}}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LEGAL KREDIT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar mt-1">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image mt-3">
                <img src="{{ asset('storage/management_user/foto_profil/' . (auth()->user()->foto ?? 'user_image.jpg')) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block mb-1" href="{{ route('layouts.profil') }}">{{ auth()->user()->name }}</a>
                @php
                    $currentUser = auth()->user(); // Ambil user yang sedang login
                @endphp

                <span>
                    @if ($currentUser->getRoleNames() && $currentUser->getRoleNames()->isNotEmpty())
                        @foreach ($currentUser->getRoleNames() as $rolename)
                            <span class="badge bg-success d-inline font-weight-normal text-xs">{{ $rolename }}</span>
                        @endforeach
                    @endif
                </span>
 
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat nav-child-indent" data-widget="treeview"
                role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
            with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{ route('beranda') }}" class="nav-link {{ request()->is('beranda') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview {{ request()->is('surat_keluar/roya*') || request()->is('surat_keluar/lunas*') || request()->is('surat_keluar/tidak_dijaminkan*') || request()->is('surat_keluar/bukan_nasabah*') || request()->is('surat_keluar/surat_keluar_lain*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-upload"></i>
                        <p>
                            Surat Keluar
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view_roya')
                            <li class="nav-item">
                                <a href="{{ route('roya.index') }}" class="nav-link {{ request()->is('surat_keluar/roya*') ? 'active' : '' }}">
                                    <i class="fas fa-file-prescription nav-icon"></i>
                                    <p>ROYA</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_lunas')
                            <li class="nav-item">
                                <a href="{{ route('lunas.index') }}" class="nav-link {{ request()->is('surat_keluar/lunas*') ? 'active' : '' }}">
                                    <i class="fas fa-file-signature nav-icon"></i>
                                    <p>Lunas</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_tidak_dijaminkan')
                            <li class="nav-item">
                                <a href="{{ route('tidak_dijaminkan.index') }}" class="nav-link {{ request()->is('surat_keluar/tidak_dijaminkan*') ? 'active' : '' }}">
                                    <i class="fas fa-file-medical-alt nav-icon"></i>
                                    <p>Tidak Dijaminkan</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_bukan_nasabah')
                            <li class="nav-item">
                                <a href="{{ route('bukan_nasabah.index') }}" class="nav-link {{ request()->is('surat_keluar/bukan_nasabah*') ? 'active' : '' }}">
                                    <i class="fas fa-users-slash nav-icon"></i>
                                    <p>Bukan Nasabah</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_surat_keluar_lain')
                            <li class="nav-item">
                                <a href="{{ route('surat_keluar_lain.index') }}" class="nav-link {{ request()->is('surat_keluar/surat_keluar_lain*') ? 'active' : '' }}">
                                    <i class="fas fa-file-pdf nav-icon"></i>
                                    <p>Lain-Lain</p>
                                </a>
                            </li>    
                        @endcan
                        
                    </ul>
                </li>

                <li class="nav-item has-treeview {{ request()->is('notaris/minuta*') || request()->is('notaris/salinan*') || request()->is('notaris/order*') || request()->is('notaris/tagihan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-edit"></i>
                        <p>
                            Notaris
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view_minuta')
                            <li class="nav-item">
                                <a href="{{ route('minuta.index') }}" class="nav-link {{ request()->is('notaris/minuta*') ? 'active' : '' }}">
                                    <i class="fas fa-newspaper nav-icon"></i>
                                    <p>Minuta</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_salinan')
                            <li class="nav-item">
                                <a href="{{ route('salinan.index') }}" class="nav-link {{ request()->is('notaris/salinan*') ? 'active' : '' }}">
                                    <i class="fas fa-copy nav-icon"></i>
                                    <p>Salinan</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_order')
                            <li class="nav-item">
                                <a href="{{ route('order.index') }}" class="nav-link {{ request()->is('notaris/order*') ? 'active' : '' }}">
                                    <i class="fas fa-tasks nav-icon"></i>
                                    <p>Order</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_tagihan')
                            <li class="nav-item">
                                <a href="{{ route('tagihan.index') }}" class="nav-link {{ request()->is('notaris/tagihan*') ? 'active' : '' }}">
                                    <i class="fas fa-file-invoice-dollar nav-icon"></i>
                                    <p>Tagihan</p>
                                </a>
                            </li>    
                        @endcan
                        
                    </ul>
                </li>

                {{-- <li class="nav-item {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_keuangan*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*')  || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_isidentil*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-signature"></i>
                        <p>
                            Asuransi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*')  || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    JAMKRIDA
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item has-treeview {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*')  || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-credit-card"></i>
                                        <p>
                                            Penjaminan Kredit
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('view_roya')
                                            <li class="nav-item">
                                                <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') ? 'active' : '' }}">
                                                    <i class="fas fa-money-bill-wave nav-icon"></i>
                                                    <p>POLIS</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('view_roya')
                                            <li class="nav-item">
                                                <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                                    <i class="fas fa-money-check-alt nav-icon"></i>
                                                    <p>PREMI</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nav-item has-treeview {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*')  || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'menu-open' : '' }}">
                                    <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-money-bill-wave"></i>
                                        <p>
                                            KLAIM
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('view_roya')
                                            <li class="nav-item">
                                                <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') ? 'active' : '' }}">
                                                    <i class="fas fa-money-check-alt nav-icon"></i>
                                                    <p>PENGAJUAN</p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('view_roya')
                                            <li class="nav-item">
                                                <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                                    <i class="fas fa-money-bill-wave nav-icon"></i>
                                                    <p>PENCAIRAN</p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*')  || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_dukcapil_perbarindo*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_bpjs*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_dirjen_pajak*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ppatk*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_lps*') || request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-heartbeat"></i>
                                <p>
                                    AL-AMIN
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('view_roya')
                                    <li class="nav-item">
                                        <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_pemkab*') ? 'active' : '' }}">
                                            <i class="fas fa-money-check-alt nav-icon"></i>
                                            <p>PREMI</p>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_roya')
                                    <li class="nav-item">
                                        <a href="#" class="nav-link {{ request()->is('pelaporan/pelaporan_regulasi/pelaporan_ojk*') ? 'active' : '' }}">
                                            <i class="fas fa-money-bill-wave nav-icon"></i>
                                            <p>KLAIM</p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </li> --}}

                <li class="nav-item has-treeview {{ request()->is('jaminan/jaminan_masuk*') || request()->is('jaminan/jaminan_keluar*') || request()->is('jaminan/tukar_sementara*') || request()->is('jaminan/bukan_nasabah*') || request()->is('jaminan/jaminan_lain*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>
                            Jaminan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('view_jaminan_masuk')
                            <li class="nav-item">
                                <a href="{{ route('jaminan_masuk.index') }}" class="nav-link {{ request()->is('jaminan/jaminan_masuk*') ? 'active' : '' }}">
                                    <i class="fas fa-file-download nav-icon"></i>
                                    <p>Masuk</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_jaminan_keluar')
                            <li class="nav-item">
                                <a href="{{ route('jaminan_keluar.index') }}" class="nav-link {{ request()->is('jaminan/jaminan_keluar*') ? 'active' : '' }}">
                                    <i class="fas fa-file-upload nav-icon"></i>
                                    <p>Keluar</p>
                                </a>
                            </li>    
                        @endcan

                        @can('view_tukar_sementara')
                            <li class="nav-item">
                                <a href="{{ route('tukar_sementara.index') }}" class="nav-link {{ request()->is('jaminan/tukar_sementara*') ? 'active' : '' }}">
                                    <i class="fas fa-exchange-alt nav-icon"></i>
                                    <p>Tukar Sementara</p>
                                </a>
                            </li>    
                        @endcan

                    </ul>
                </li>

                @can('view_management_user')
                <li class="nav-item has-treeview {{ request()->is('management_user/roles*') || request()->is('management_user/permission*') || request()->is('management_user/users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Management User
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('management_user/users') ? 'active' : '' }}">
                                <i class="fas fa-users-cog nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('management_user/roles') ? 'active' : '' }}">
                                <i class="fas fa-user-check nav-icon"></i>
                                <p>Role</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permission.index') }}" class="nav-link {{ request()->is('management_user/permission') ? 'active' : '' }}">
                                <i class="fas fa-user-tag nav-icon"></i>
                                <p>Permission</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
