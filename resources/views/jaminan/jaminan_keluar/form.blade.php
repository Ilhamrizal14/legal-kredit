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
                    <!-- Form TANGGAL MASUK -->
                    <div class="form-group row">
                        <label for="tgl_keluar" class="col-md-4 control-label">TANGGAL MASUK</label>
                        <div class="col-md-8">
                            <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control" required>
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

                    <!-- Form JENIS JAMINAN -->
                    <div class="form-group row">
                        <label for="jenis_jaminan" class="col-md-4 control-label">JENIS JAMINAN</label>
                        <div class="col-md-8">
                            <input type="text" name="jenis_jaminan" id="jenis_jaminan" placeholder="Masukkan Jenis Jaminan" class="form-control" required>
                        </div>
                    </div>
                    
                    <!-- Form NO. REGISTRASI -->
                    <div class="form-group row">
                        <label for="no_registrasi" class="col-md-4 control-label">NO. REGISTRASI</label>
                        <div class="col-md-8">
                            <input type="text" name="no_registrasi" id="no_registrasi" placeholder="Masukkan No. Registrasi" class="form-control" required>
                        </div>
                    </div>

                    <!-- Form KETERANGAN -->
                    <div class="form-group row">
                        <label for="keterangan" class="col-md-4 control-label">KETERANGAN</label>
                        <div class="col-md-8">
                            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Form JUMLAH JAMINAN -->
                    <div class="form-group row">
                        <label for="jumlah_jaminan" class="col-md-4 control-label">JUMLAH JAMINAN</label>
                        <div class="col-md-8">
                            <input type="text" name="jumlah_jaminan" id="jumlah_jaminan" placeholder="Masukkan Jumlah Jaminan" class="form-control" required>
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
                    <form id="jaminan_keluar-form" action="{{ route('jaminan_keluar.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields -->
                        <button type="submit" class="btn btn-primary" id="submit-button" name="submit-button">Simpan</button>
                    </form>
                    
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->