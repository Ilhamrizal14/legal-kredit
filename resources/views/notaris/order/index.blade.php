@extends('layouts.master')

@section('title')
    Order
@endsection

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Notaris / Order</li>
@endsection

@section('content')

<!-- Main content -->
<section class="content">

    <div class="card">
        <div class="card-body">
            @can('create_order')
            <button onclick="addForm()" class="btn btn-primary mb-2"><i class="fa fa-plus-circle"></i> Tambah
                Data</button>
            <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#order_modal"><i class="fas fa-file-download"></i> Import Excel</button>
            @endcan
            <table id="order" class="table table-bordered table-striped table-hover table-responsive order table-sm">
                <thead class="text-center">
                    <tr>
                      <th rowspan="2">NO</th>
                      <th rowspan="2">NAMA</th>
                      <th rowspan="2">PLAFON</th>
                      <th colspan="4">ORDER</th>
                      <th rowspan="2">TANGGAL ORDER</th>
                      <th rowspan="2">NOTARIS</th>
                      <th rowspan="2">KETERANGAN</th>
                      <th rowspan="2"><i class="fas fa-cog"></i> AKSI</th>
                    </tr>
                    <tr>
                      <th>NOTARIIL</th>
                      <th>SKMHT</th>
                      <th>APHT</th>
                      <th>FIDUSIA</th>
                    </tr>
                </thead>
            </table>

            <!-- Modal Import Excel -->
            <div class="modal fade" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Import Data Excel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <form id="importForm" action="{{ route('order.import') }}" method="POST" enctype="multipart/form-data">
                        <div class="mt-3 mx-3">
                            <label for="file" class="control-label">Download Template Excel</label>
                            <a href="{{ route('order.export') }}" class="btn btn-secondary d-block"><i class="fas fa-file-upload"></i> Template Excel</a>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="form-group">
                                <label for="file" class="control-label">Upload File Excel</label>
                                <input type="file" name="file" class="form-control" required>
                            </div>                           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>

        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    {{-- Kode untuk menampilkan gambar secara penuh pada modal --}}
    {{-- <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="imageModalLabel">Dokumentasi</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img id="modalImage" src="" class="img-fluid" alt="Gambar penuh"/>
            </div>
          </div>
        </div>
    </div> --}}

</section>

@includeIf('notaris.order.form')
@endsection

<!-- Untuk meload script datatable pada elemen <table> -->
@push('script')
<script>
var table;

    $(function () {
        table = $("#order").DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": false,
            buttons: [
                'copy',
                'csv',
                'excel',
                {
                    extend: 'pdfHtml5',
                    text: 'PDF',
                    orientation: 'landscape',
                    pageSize: 'A4',
                    customize: function (doc) {
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 9,
                            color: 'black',
                            fillColor: 'gray'
                        };
                        doc.styles.tableBodyOdd = {
                            fillColor: '#f3f3f3'
                        };
                        doc.styles.tableBodyEven = {
                            fillColor: '#ffffff'
                        };
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    customize: function (win) {
                        // Menambahkan logo ke header
                        var logoUrl = '{{ asset('img/logobpr.png')}}'; // Ganti dengan URL logo Anda
                        var header = '<div style="text-align: left; margin-bottom: 5px;">' +
                                    '<img src="' + logoUrl + '" alt="Logo" style="height: 50px;">' +
                                    '</div>';

                        $(win.document.body).prepend(header);

                        // Mengubah tampilan tabel
                        $(win.document.body).find('table')
                            .addClass('display')
                            .css('font-size', '9pt')
                            .css('width', '100%');

                        // Mengatur orientasi menjadi landscape
                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    }
                },
                'colvis'
            ],
            ajax: {
                url: '{{ route('order.data') }}',
            },
            columns: [
                { data: 'DT_RowIndex' },
                { data: 'nama' },
                { data: 'plafon' },
                { data: 'notariil' },
                { data: 'skmht' },
                { data: 'apht' },
                { data: 'fidusia' },
                { data: 'tgl_order' },
                { data: 'notaris' },
                { data: 'keterangan' },
                // {
                //     data: 'dokumentasi_db',
                //     render: function(data, type, full, meta) {
                //         var images = data ? data.split(',') : [];
                //         var imageExtensions = ['jpeg', 'jpg', 'png', 'gif', 'svg'];
                //         var htmlOutput = images.map(function(file) {
                //             var fileExtension = file.split('.').pop().toLowerCase();

                //             if (imageExtensions.includes(fileExtension)) {
                //                 // Jika file adalah gambar, tampilkan gambar
                //                 return '<img src="{{ asset('storage/notaris/order') }}/' + file + '" height="50" class="mb-1" title="Dokumentasi" style="cursor:pointer;" onclick="showImageModal(\'' + file + '\')"/>';
                //             } else {
                //                 // Jika file bukan gambar, tampilkan tombol download
                //                 return '<a href="{{ asset('storage/notaris/order') }}/' + file + '" class="btn btn-primary" title="Download">Download</a>';
                //             }
                //         }).join(' ');

                //         return htmlOutput;
                //     }
                // },
                { data: 'aksi', searchable: false, sortable: false },
            ],

            "initComplete": function() {
                table.buttons().container().appendTo('#order_wrapper .col-md-6:eq(0)');
            }
        });
        

        $('#modal-form').validator().on('submit', function (e) {
            e.preventDefault(); // Mencegah submit form secara default

            var form = $('#modal-form form')[0]; // Ambil elemen form
            var formData = new FormData(form); // Buat FormData dari elemen form

            $.ajax({
                url: $(form).attr('action'), // URL aksi form
                type: 'POST',
                data: formData,
                processData: false, // Cegah jQuery dari memproses data
                contentType: false, // Set contentType ke false agar FormData yang menangani
                success: function(response) {
                    if (response.success) { // Cek apakah respons sukses dari server
                        $('#modal-form').modal('hide'); // Sembunyikan modal jika sukses
                        table.ajax.reload(null, false); // Muat ulang DataTable tanpa kembali ke halaman 1

                        // Notifikasi SweetAlert untuk sukses
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            text: response.message // Tampilkan pesan dari server
                        });
                    }
                },
                error: function(errors) {
                    alert('Gagal menyimpan data!'); // Tampilkan pesan error
                }
            });
        });


    });


    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Data Order');

        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', '');
        $('#form-method').val('POST');
        $('#submit-button').text('Simpan');

        $('#modal-form [id=submit-button]').show();
        $('#modal-form [name="dokumentasi[]"]').show();

        $.get(url)
        .done((response) => {
            $('#modal-form [name=nama]').attr('disabled', false);
            $('#modal-form [name=plafon]').attr('disabled', false);
            $('#modal-form [name=notariil]').attr('disabled', false);
            $('#modal-form [name=skmht]').attr('disabled', false);
            $('#modal-form [name=apht]').attr('disabled', false);
            $('#modal-form [name=fidusia]').attr('disabled', false);
            $('#modal-form [name=notaris]').attr('disabled', false);
            $('#modal-form [name=tgl_order]').attr('disabled', false);
            $('#modal-form [name=keterangan]').attr('disabled', false);
            // No need to fill file inputs
        })
        .fail((errors) => {
            alert('Cannot display data');
        });
    }

    function editForm(url) {
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Edit Data Order');

    $('#modal-form form')[0].reset();
    $('#modal-form form').attr('action', url);
    $('#form-method').val('PUT');
    $('#submit-button').text('Update');
    
    $('#modal-form [id=submit-button]').show();
    $('#modal-form [name="dokumentasi[]"]').show();

    $.get(url)
        .done((response) => {
            $('#modal-form [name=nama]').val(response.nama).attr('disabled', false);
            $('#modal-form [name=plafon]').val(response.plafon).attr('disabled', false);
            $('#modal-form [name=notariil]').val(response.notariil).attr('disabled', false);
            $('#modal-form [name=skmht]').val(response.skmht).attr('disabled', false);
            $('#modal-form [name=apht]').val(response.apht).attr('disabled', false);
            $('#modal-form [name=fidusia]').val(response.fidusia).attr('disabled', false);
            $('#modal-form [name=tgl_order]').val(response.tgl_order).attr('disabled', false);
            $('#modal-form [name=notaris]').val(response.notaris).attr('disabled', false);
            $('#modal-form [name=keterangan]').val(response.keterangan).attr('disabled', false);
            // No need to fill file inputs
        })
        .fail((errors) => {
            alert('Cannot display data');
        });
    }

    function viewForm(url) { 
    $('#modal-form').modal('show');
    $('#modal-form .modal-title').text('Lihat Data Order');

    $('#modal-form form')[0].reset();
    $('#modal-form form').attr('action', url);
    $('#form-method').val('PUT');

    $('#modal-form [id=submit-button]').hide();
    $('#modal-form [name="dokumentasi[]"]').hide();

    $.get(url)
        .done((response) => {
            $('#modal-form [name=nama]').val(response.nama).attr('disabled', true);
            $('#modal-form [name=plafon]').val(response.plafon).attr('disabled', true);
            $('#modal-form [name=notariil]').val(response.notariil).attr('disabled', true);
            $('#modal-form [name=skmht]').val(response.skmht).attr('disabled', true);
            $('#modal-form [name=apht]').val(response.apht).attr('disabled', true);
            $('#modal-form [name=fidusia]').val(response.fidusia).attr('disabled', true);
            $('#modal-form [name=tgl_order]').val(response.tgl_order).attr('disabled', true);
            $('#modal-form [name=notaris]').val(response.notaris).attr('disabled', true);
            $('#modal-form [name=keterangan]').val(response.keterangan).attr('disabled', true);
            // No need to fill file inputs
        })
        .fail((errors) => {
            alert('Cannot display data');
        });
    }

    function cloneForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Clone Data Order');

        // Reset form
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', '{{ route("order.store") }}'); // Gunakan route store untuk menyimpan data baru
        $('#form-method').val('POST');
        $('#submit-button').text('Simpan');

        // Fetch data from server
        $.get(url)
            .done(function(response) {
                // Isi form dengan data yang didapat
                $('#modal-form [name=nama]').val(response.nama).attr('disabled', false);
                $('#modal-form [name=plafon]').val(response.plafon).attr('disabled', false);
                $('#modal-form [name=notariil]').val(response.notariil).attr('disabled', false);
                $('#modal-form [name=skmht]').val(response.skmht).attr('disabled', false);
                $('#modal-form [name=apht]').val(response.apht).attr('disabled', false);
                $('#modal-form [name=fidusia]').val(response.fidusia).attr('disabled', false);
                $('#modal-form [name=tgl_order]').val(response.tgl_order).attr('disabled', false);
                $('#modal-form [name=notaris]').val(response.notaris).attr('disabled', false);
                $('#modal-form [name=keterangan]').val(response.keterangan).attr('disabled', false);
                // Tidak mengisi input file karena ini data baru
            })
            .fail(function() {
                alert('Data tidak dapat diambil');
            });
    }

    function deleteData(url) {
        Swal.fire({
            title: 'Apakah yakin ingin menghapus data ini?',
            text: "Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Simpan informasi halaman saat ini sebelum menghapus data
                let currentPage = table.page();

                $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'DELETE'
                })
                .done((response) => {
                    if (response.success) {
                        // Reload DataTable tanpa mengubah halaman
                        table.ajax.reload(null, false); // `false` agar tetap di halaman yang sama
                        
                        // Tampilkan notifikasi sukses
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            text: response.message
                        });
                    }
                })
                .fail((errors) => {
                    // Tampilkan notifikasi error jika gagal
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        text: 'Gagal menghapus data!'
                    });
                });
            }
        });
    }

    //Notifikasi import excel
        $('#importForm').on('submit', function (e) {
        e.preventDefault();

        let formData = new FormData(this);

        // Kirim permintaan AJAX
        $.ajax({
            url: $(this).attr('action'), // URL dari form action
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                // Jika sukses
                if (response.status === 'success') {
                    // Tampilkan notifikasi sukses
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        text: response.message
                    });

                    // Tutup modal
                    $('#order_modal').modal('hide');

                    // Reset form
                    $('#importForm')[0].reset();

                    // Reload DataTable
                    $('#order').DataTable().ajax.reload();
                }
            },
            error: function (xhr) {
                // Jika gagal
                Swal.fire({
                    title: 'Gagal!',
                    text: xhr.responseJSON?.message || 'Terjadi kesalahan.',
                    icon: 'error',
                    timer: 3000,
                    showConfirmButton: false
                });
            }
        });
    });

    //Fitur untuk membuka gambar di tab baru
    // function showImageModal(imageUrl) {
    // var fullImageUrl = '{{ asset('storage/notaris/order') }}/' + imageUrl;
    // document.getElementById('modalImage').src = fullImageUrl;
    // $('#imageModal').modal('show');
    // }
</script>

@endpush