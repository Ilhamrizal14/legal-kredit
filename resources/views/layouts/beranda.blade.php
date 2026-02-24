@extends('layouts.master')

@section('title')
    Beranda
@endsection

@section('content')

<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('assets/dist/img/legal_kredit.png')}}" alt="legal_kredit" height="60"
        width="60">
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="mb-4">
            <div class="container-fluid">
                <h5 class="display-4">Halo, {{ auth()->user()->name }}</h5>
                <p class="text-secondary text-justify">Sistem informasi yang telah dikembangkan ini merupakan sebuah solusi terintegrasi untuk mengelola berbagai jenis data dan dokumen penting dalam lingkup Legal Kredit serta operasional notaris dan administrasi terkait. Sistem ini dirancang untuk memudahkan pengelolaan, penyimpanan, dan pelacakan data secara efisien, serta meningkatkan akurasi dan keamanan informasi. Berikut adalah beberapa menu pintasan dari sistem informasi ini:</p>
            </div>
        </div>
        <div class="row">
            <div class="col card rounded-md mx-2">
                <div class="card-header">
                    <h4><i class="fas fa-file-upload"></i> Surat Keluar</h4>
                </div>
                <div class="card-body mt-1">
                    <a href="{{ route('roya.index') }}" class="btn btn-danger btn-xl my-1 mx-1" role="button"><i class="fas fa-file-prescription"></i> <br/>ROYA</a>
                    <a href="{{ route('lunas.index') }}" class="btn btn-warning btn-xl my-1 mx-1" role="button"><i class="fas fa-file-signature"></i> <br/>Lunas</a>
                    <a href="{{ route('tidak_dijaminkan.index') }}" class="btn btn-success btn-xl my-1 mx-1" role="button"><i class="fas fa-file-medical-alt"></i> <br/>Tidak Dijaminkan</a>
                    <a href="{{ route('bukan_nasabah.index') }}" class="btn btn-primary btn-xl my-1 mx-1" role="button"><i class="fas fa-users-slash"></i> <br/>Bukan Nasabah</a>
                    <a href="{{ route('surat_keluar_lain.index') }}" class="btn btn-secondary btn-xl my-1 mx-1" role="button"><i class="fas fa-file-pdf"></i> <br/>Lain-Lain</a>
                </div>
            </div>
            <div class="col card rounded-md mx-2">
                <div class="card-header">
                    <h4><i class="fas fa-user-edit"></i> Notaris</h4>
                </div>
                <div class="card-body mt-1">
                <a href="{{ route('minuta.index') }}" class="btn btn-danger btn-xl mx-1 my-1" role="button"><i class="fas fa-newspaper"></i> <br/>Minuta</a>
                <a href="{{ route('salinan.index') }}" class="btn btn-warning btn-xl mx-1 my-1" role="button"><i class="fas fa-copy"></i> <br/>Salinan</a>
                <a href="{{ route('order.index') }}" class="btn btn-success btn-xl mx-1 my-1" role="button"><i class="fas fa-tasks"></i> <br/>Order</a>
                <a href="{{ route('tagihan.index') }}" class="btn btn-primary btn-xl mx-1 my-1" role="button"><i class="fas fa-file-invoice-dollar"></i> <br/>Tagihan</a>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col card rounded-md mx-2">
                <div class="card-header">
                    <h4><i class="fas fa-user-shield"></i> Jaminan</h4>
                </div>
                <div class="card-body mt-1">
                <a href="{{ route('jaminan_masuk.index') }}" class="btn btn-danger btn-xl mx-1 my-1" role="button"><i class="fas fa-file-download"></i> <br/>Masuk</a>
                <a href="{{ route('jaminan_keluar.index') }}" class="btn btn-warning btn-xl mx-1 my-1" role="button"><i class="fas fa-file-upload"></i> <br/>Keluar</a>
                <a href="{{ route('tukar_sementara.index') }}" class="btn btn-success btn-xl mx-1 my-1" role="button"><i class="fas fa-exchange-alt"></i> <br/>Tukar Sementara</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

