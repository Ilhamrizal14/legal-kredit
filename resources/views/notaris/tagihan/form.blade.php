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
                            <!-- Form TANGGAL BAYAR -->
                            <div class="form-group row">
                                <label for="tgl_bayar" class="col-md-4 control-label">TANGGAL BAYAR</label>
                                <div class="col-md-8">
                                    <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control" required>
                                </div>
                            </div>

                            <!-- Form BULAN TAGIHAN -->
                            <div class="form-group row">
                                <label for="bulan_tagihan" class="col-md-4 control-label">BULAN TAGIHAN</label>
                                <div class="col-md-8">
                                    <select name="bulan_tagihan" id="bulan_tagihan" class="form-control">
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="September">September</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Form TAHUN -->
                            <div class="form-group row">
                                <label for="tahun" class="col-md-4 control-label">TAHUN</label>
                                <div class="col-md-8">
                                    <input type="text" name="tahun" id="tahun" class="form-control" placeholder="2025" required>
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

                            <!-- Form NOTARIIL -->
                            <div class="form-group row">
                                <label for="notariil" class="col-md-4 control-label">NOTARIIL</label>
                                <div class="col-md-8">
                                    <input type="text" id="notariil_display" name="notariil" class="form-control" placeholder="Rp. 1.000.000" required>
                                    <input type="hidden" name="notariil" id="notariil">
                                </div>
                            </div>

                            <!-- Form SKMHT -->
                            <div class="form-group row">
                                <label for="skmht" class="col-md-4 control-label">SKMHT</label>
                                <div class="col-md-8">
                                    <input type="text" id="skmht_display" name="skmht" class="form-control" placeholder="Rp. 1.000.000" required>
                                    <input type="hidden" name="skmht" id="skmht">
                                </div>
                            </div>
                            </div>

                            <div class="col-md-6 px-4">
                            <!-- Form APHT -->
                            <div class="form-group row">
                                <label for="apht" class="col-md-4 control-label">APHT</label>
                                <div class="col-md-8">
                                    <input type="text" id="apht_display" name="apht" class="form-control" placeholder="Rp. 1.000.000" required>
                                    <input type="hidden" name="apht" id="apht">
                                </div>
                            </div>

                            <!-- Form FIDUSIA -->
                            <div class="form-group row">
                                <label for="fidusia" class="col-md-4 control-label">FIDUSIA</label>
                                <div class="col-md-8">
                                    <input type="text" id="fidusia_display" name="fidusia" class="form-control" placeholder="Rp. 1.000.000" required>
                                    <input type="hidden" name="fidusia" id="fidusia">
                                </div>
                            </div>

                            <!-- Form TOTAL -->
                            <div class="form-group row">
                                <label for="total" class="col-md-4 control-label">TOTAL</label>
                                <div class="col-md-8">
                                    <input type="text" id="total_display" name="total" class="form-control" placeholder="Akan terisi otomatis" readonly>
                                    <input type="hidden" name="total" id="total">
                                </div>
                            </div>

                            <!-- Form KETERANGAN -->
                            <div class="form-group row">
                                <label for="keterangan" class="col-md-4 control-label">KETERANGAN</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
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
                    <button type="submit" class="btn btn-primary" id="submit-button" name="submit-button">Simpan</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function formatUang(input, hiddenInputId) {
        // Remove non-digit characters
        const rawValue = input.value.replace(/\D/g, '');
        
        // Format value as currency
        const formattedValue = new Intl.NumberFormat('id-ID', {
            style: 'decimal',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(rawValue);
        
        // Set formatted value to the input
        input.value = formattedValue;

        // Update hidden input with the raw numeric value
        const hiddenInput = document.getElementById(hiddenInputId);
        if (hiddenInput) hiddenInput.value = rawValue;
    }

    function calculateTotal() {
        // Get raw values from hidden inputs
        const notariil = parseFloat(document.getElementById('notariil')?.value || 0);
        const skmht = parseFloat(document.getElementById('skmht')?.value || 0);
        const apht = parseFloat(document.getElementById('apht')?.value || 0);
        const fidusia = parseFloat(document.getElementById('fidusia')?.value || 0);

        // Calculate total
        const total = notariil + skmht + apht + fidusia;

        // Update total display and hidden input
        const totalDisplay = document.getElementById('total_display');
        const totalHidden = document.getElementById('total');
        if (totalDisplay) totalDisplay.value = new Intl.NumberFormat('id-ID').format(total);
        if (totalHidden) totalHidden.value = total;
    }

    // Attach event listeners for formatting and calculation
    ['notariil', 'skmht', 'apht', 'fidusia'].forEach(id => {
        const displayInput = document.getElementById(`${id}_display`);
        if (displayInput) {
            displayInput.addEventListener('input', () => {
                formatUang(displayInput, id);
                calculateTotal();
            });
        }
    });
</script>