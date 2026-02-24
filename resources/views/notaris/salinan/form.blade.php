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
                            <!-- Form NAMA -->
                            <div class="form-group row">
                                <label for="nama" class="col-md-4 control-label">NAMA</label>
                                <div class="col-md-8">
                                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama" class="form-control" required>
                                </div>
                            </div>

                            <!-- Form PLAFON -->
                            <div class="form-group row">
                                <label for="plafon" class="col-md-4 control-label">PLAFON</label>
                                <div class="col-md-8">
                                    <input type="text" id="plafon" name="plafon" class="form-control" placeholder="Masukkan plafon" oninput="formatUang(this)" required>
                                    <input type="hidden" id="plafon_hidden" name="plafon">
                                </div>
                            </div>

                            <!-- Form NOTARIIL -->
                            <div class="form-group row">
                                <label for="notariil" class="col-md-4 control-label">NOTARIIL</label>
                                <div class="col-md-8">
                                    <select name="notariil" id="notariil" class="form-control">
                                        <option value="Tidak Ada">Tidak Ada</option>
                                        <option value="Ada">Ada</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form SKMHT -->
                            <div class="form-group row">
                                <label for="skmht" class="col-md-4 control-label">SKMHT</label>
                                <div class="col-md-8">
                                    <select name="skmht" id="skmht" class="form-control">
                                        <option value="Tidak Ada">Tidak Ada</option>
                                        <option value="Ada">Ada</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form APHT -->
                            <div class="form-group row">
                                <label for="apht" class="col-md-4 control-label">APHT</label>
                                <div class="col-md-8">
                                    <select name="apht" id="apht" class="form-control">
                                        <option value="Tidak Ada">Tidak Ada</option>
                                        <option value="Ada">Ada</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                        <!-- Kolom 2 -->
                        <div class="col-md-6 px-4">

                            <!-- Form FIDUSIA -->
                            <div class="form-group row">
                                <label for="fidusia" class="col-md-4 control-label">FIDUSIA</label>
                                <div class="col-md-8">
                                    <select name="fidusia" id="fidusia" class="form-control">
                                        <option value="Tidak Ada">Tidak Ada</option>
                                        <option value="Ada">Ada</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form NOTARIS -->
                            <div class="form-group row">
                                <label for="notaris" class="col-md-4 control-label">NOTARIS</label>
                                <div class="col-md-8">
                                    <select name="notaris" id="notaris" class="form-control">
                                        <option value="ENI ZUBAIDAH">ENI ZUBAIDAH</option>
                                        <option value="FARIDA HIDAYATI">FARIDA HIDAYATI</option>
                                        <option value="ACHMAD MUAS">ACHMAD MUAS</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Form TANGGAL REALISASI -->
                            <div class="form-group row">
                                <label for="tgl_realisasi" class="col-md-4 control-label">TANGGAL REALISASI</label>
                                <div class="col-md-8">
                                    <input type="date" name="tgl_realisasi" id="tgl_realisasi" class="form-control" required>
                                </div>
                            </div>
                            
                            <!-- Form TANGGAL PENYERAHAN -->
                            <div class="form-group row">
                                <label for="tgl_penyerahan" class="col-md-4 control-label">TANGGAL PENYERAHAN</label>
                                <div class="col-md-8">
                                    <input type="date" name="tgl_penyerahan" id="tgl_penyerahan" class="form-control" required>
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
                            {{-- <div class="form-group row">
                                <label for="dokumentasi" name="dokumentasi[]" class="col-md-4 control-label">Dokumentasi</label>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="dokumentasi" name="dokumentasi[]" multiple>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <form id="salinan-form" action="{{ route('salinan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields -->
                        <button type="submit" class="btn btn-primary" id="submit-button" name="submit-button">Simpan</button>
                    </form>
                    
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    // Function to format input value as currency
    function formatUang(input) {
        // Remove all non-digit characters
        let rawValue = input.value.replace(/\D/g, '');
        
        // Format the value with commas
        let formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'decimal',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(rawValue);
        
        // Set the formatted value back to the input
        input.value = formattedValue;

        // Update the hidden input with the raw numeric value
        document.getElementById('plafon_hidden').value = rawValue;
    }
</script>