<div class="modal fade" id="modal-form" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
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
                    <div class="row">
                        <div class="col-md-6 px-4">
                            <!-- Form NOMOR SURAT -->
                            <div class="form-group row">
                                <label for="nomor_surat" class="col-md-4 control-label">NOMOR SURAT</label>
                                <div class="col-md-8">
                                    <input type="text" name="nomor_surat" id="nomor_surat" placeholder="Masukkan nomor surat" class="form-control" required>
                                </div>
                            </div>

                            <!-- Form PERIHAL -->
                            <div class="form-group row">
                                <label for="perihal" class="col-md-4 control-label">PERIHAL</label>
                                <div class="col-md-8">
                                    <input type="text" name="perihal" id="perihal" placeholder="Masukkan perihal" class="form-control" required>
                                </div>
                            </div>

                            <!-- Form TANGGAL SURAT -->
                            <div class="form-group row">
                                <label for="tgl_surat" class="col-md-4 control-label">TANGGAL SURAT</label>
                                <div class="col-md-8">
                                    <input type="date" name="tgl_surat" id="tgl_surat" class="form-control" required>
                                </div>
                            </div>

                            <!-- Form TANGGAL KELUAR -->
                            <div class="form-group row">
                                <label for="tgl_keluar" class="col-md-4 control-label">TANGGAL KELUAR</label>
                                <div class="col-md-8">
                                    <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <!-- Kolom 2 -->
                        <div class="col-md-6 px-4">

                            <!-- Form TUJUAN -->
                            <div class="form-group row">
                                <label for="tujuan" class="col-md-4 control-label">TUJUAN</label>
                                <div class="col-md-8">
                                    <input type="text" name="tujuan" id="tujuan" placeholder="Masukkan tujuan" class="form-control" required>
                                </div>
                            </div>

                            <!-- Form KETERANGAN -->
                            <div class="form-group row">
                                <label for="keterangan" class="col-md-4 control-label">KETERANGAN</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Form File -->
                            <div class="form-group row">
                                <label for="dokumentasi" name="dokumentasi[]" class="col-md-4 control-label">FILE</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" multiple>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <form id="lunas-form" action="{{ route('lunas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields -->
                        <button type="submit" class="btn btn-primary" id="submit-button" name="submit-button">Simpan</button>
                    </form>
                    
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
