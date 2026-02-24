<div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog modal-md" role="document">
        <form method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="_method" id="form-method" value="POST">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Form NO. SURAT -->
                    <div class="form-group row">
                        <label for="no_surat" class="col-md-4 control-label">NO. SURAT</label>
                        <div class="col-md-8">
                            <input type="text" name="no_surat" id="no_surat" class="form-control" placeholder="Masukkan Nomor Surat" required>
                        </div>
                    </div>

                    <!-- Form NAMA -->
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 control-label">NAMA</label>
                        <div class="col-md-8">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required>
                        </div>
                    </div>

                    <!-- Form NO. REKENING -->
                    <div class="form-group row">
                        <label for="no_rekening" class="col-md-4 control-label">NO. REKENING</label>
                        <div class="col-md-8">
                            <input type="number" id="no_rekening" name="no_rekening" class="form-control" placeholder="Masukkan Nomor Rekening" required>
                        </div>
                    </div>

                    <!-- Form SEBENARNYA -->
                    <div class="form-group row">
                        <label for="sebenarnya" class="col-md-4 control-label">SEBENARNYA</label>
                        <div class="col-md-8">
                            <input type="text" name="sebenarnya" id="sebenarnya" placeholder="Masukkan Jaminan Sebenarnya" class="form-control" required>
                        </div>
                    </div>
                    
                    <!-- Form YANG DITUKAR -->
                    <div class="form-group row">
                        <label for="yang_ditukar" class="col-md-4 control-label">YANG DITUKAR</label>
                        <div class="col-md-8">
                            <input type="text" name="yang_ditukar" id="yang_ditukar" placeholder="Masukkan Jaminan yang Ditukar" class="form-control" required>
                        </div>
                    </div>

                    <!-- Form TANGGAL KEMBALI -->
                    <div class="form-group row">
                        <label for="tgl_kembali" class="col-md-4 control-label">TANGGAL KEMBALI</label>
                        <div class="col-md-8">
                            <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
                        </div>
                    </div>

                    <!-- Form KETERANGAN -->
                    <div class="form-group row">
                        <label for="keterangan" class="col-md-4 control-label">KETERANGAN</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Form File -->
                    {{-- <div class="form-group row">
                        <label for="dokumentasi" name="dokumentasi[]" class="col-md-4 control-label">Dokumentasi</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" multiple>
                        </div>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <form id="tukar_sementara-form" action="{{ route('tukar_sementara.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields -->
                        <button type="submit" class="btn btn-primary" id="submit-button" name="submit-button">Simpan</button>
                    </form>
                    
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->