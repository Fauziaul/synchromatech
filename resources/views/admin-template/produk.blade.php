@extends('admin-template.template')

@section('page_style')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{url('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<style>
    .tooltip-inner {
        max-width: 210px;
        /* If max-width does not work, try using width instead */
        width: 900px;
    }
    #preview {
    object-fit: cover; /* Menjaga proporsi gambar tetap utuh dalam lingkaran */
    width: 150px; /* Lebar gambar */
    height: 150px; /* Tinggi gambar */
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-12">
        <h4 class="fw-bold text-sm"><span class="text-muted fw-light text-xs"></span>
         Produk
        </h4>
    </div>
    <div class="col-md-2 col-12 mb-3 ps-5 d-flex justify-content-between">
    </div>
    <!-- Button Add Activity -->
    <div class="col-md-2 col-12 text-end">
    <button class="btn btn-coklat waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modal-produk"  >
    Tambah
    </button>
    </div>
</div>

<div class="col-xl-12">
    <div class="nav-align-top">
        <div class="tab-content mt-4">
            <div class="tab-pane fade show active" id="navs-pills-justified-users" role="tabpanel">
                <div class="card-datatable table-responsive">
                    <table class="table" id="table-produk">
                        <thead>
                            <tr>
                                <th style="max-width: 30px;">NO</th>
                                <th >Nama Produk</th>
                                <th>Dibuat</th>
                                <th>Diperbarui</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-produk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <h5 class="modal-title" id="modal-title">Tambah Aktifitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="default-form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/produk/store') }}">
                @csrf
                <div class="modal-body">

                    
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            @if ($produk?->picture?? '')
                                <img src="{{ Storage::url('' .$produk?->picture?? '') }}" alt="profile" class=" mb-3 pt-1 mt-4" name="picture" id="preview">
                            @else
                                <img src="{{ url("assets/img/avatars/no-image.png")}}" alt="user-avatar" 
                                class=" mb-3 pt-1 mt-4" id="preview" />
                            @endif 
                            <div class="button-wrapper form-input">
                                <label for="picture" class="btn ti ti-upload btn-coklat me-2 mb-3" tabindex="0">
                                    <i class="ti ti-upload d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Pilih gambar produk</span>
                                    <input type="file" id="picture" name="picture" class="account-file-input" hidden accept="image/png, image/jpeg" />
                                </label>
                                {{-- <div class="text-muted">Allowed JPG, GIF, or PNG. Max size of 800K</div> --}}
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col mb-2 form-input">
                            <label for="nama-produk" class="form-label">Nama Produk</label>
                            <input type="text" id="nama_produk" onkeyup="this.value = this.value.replace(/[^a-zA-Z\s]+/gi, '');" name="nama_produk" class="form-control" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-2 form-input">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" id="harga" onkeyup="this.value = this.value.replace(/[^0-9]+/g, '');" name="harga" class="form-control" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-2 form-input">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="text" id="stok" onkeyup="this.value = this.value.replace(/[^0-9]+/g, '');" name="stok" class="form-control" placeholder="" />
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-2 form-input">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select select2" id="kategori" name="kategori"
                                data-placeholder="Pilih Kategori">
                                <option disabled selected>Pilih Kategori</option>
                                @foreach ($kategori as $u)
                                    <option value="{{ $u->id_kategori }}">{{ $u->deskripsi }}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" data-bs-toggle="first" id="modal-button" class="btn btn-coklat">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page_script')
<script src="{{url('assets/vendor/libs/jquery-repeater/jquery-repeater.js')}}"></script>
<script src="{{url('assets/js/forms-extras.js')}}"></script>
<script>
    var table = $('#table-produk').DataTable({
        ajax: '{{ url("admin/produk/show")}}',
        serverSide: false,
        processing: true,
        deferRender: true,
        type: 'GET',
        destroy: true,
        columns: 
            [{
                data: "DT_RowIndex"
        
            },
            {
                data: "deskripsi",
                name: "deskripsi"
            },
            {
                data: "created_at",
                name: "created_at",
            },
            {
                data: "updated_at",
                name: "updated_at",
            },
            {
                data: "picture",
                name: "picture",
            },
            {
                data: "harga",
                name: "harga",
            },
            {
                data: "status",
                name: "status",
            },
            {
                data: "action",
                name: "action"
            },
        ],
    });


    function edit(e) {
        let id = e.attr('data-id');
        let action = `{{ url('admin/produk/update') }}/${id}`;
        var url = `{{ url('admin/produk/edit') }}/${id}`;

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {

                $("#modal-title").html("Edit Aktifitas");
                $("#modal-button").html("Update Data");
                $('#modal-produk form').attr('action', action);
                $('#deskripsi').val(response.deskripsi);
                if (response.picture) {
                    $('#preview').attr('src', `{{ Storage::url('') }}${response.picture}`);
                } else {
                    $('#preview').attr('src', "{{ url('assets/img/avatars/14.png') }}");
                }

                $('#modal-produk').modal('show');
            }
        });
    }

    $("#modal-produk").on("hide.bs.modal", function() {
        $("#modal-title").html("Tambah Akifitas");
        $("#modal-button").html("Simpan")
        $('#modal-produk form')[0].reset();
        $('#modal-produk form #role').val('').trigger('change');
        $('#modal-produk form').attr('action', "{{ url('admin/produk/store') }}");
        $('.invalid-feedback').removeClass('d-block');
        $('.form-control').removeClass('is-invalid');
    });

    

    // Ambil elemen input dan img
    const imgInput = document.getElementById('picture');
    const preview = document.getElementById('preview');

    // Event listener untuk perubahan input file
    imgInput.addEventListener('change', function (event) {
        const file = event.target.files[0]; // Ambil file yang dipilih

        if (file) {
            // Preview gambar baru
            preview.src = URL.createObjectURL(file);
        } else {
            // Jika tidak ada file, gunakan gambar default
            preview.src = "{{ url('assets/img/avatars/14.png') }}";
        }
    });

   
    jQuery(function() {
        jQuery('.showSingle').click(function() {
            jQuery('.targetDiv').hide('.cnt');
            jQuery('#div' + $(this).attr('target')).slideToggle();
        });
    });
</script>

<script src="{{url('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{url('assets/js/extended-ui-sweetalert2.js')}}"></script>
@endsection
