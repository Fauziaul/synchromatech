@extends('admin-template.template')
@section('meta_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('page_style')
<link rel="stylesheet" href="{{url('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-12">
        <h4 class="fw-bold text-sm"><span class="text-muted fw-light text-xs"></span>
            
        </h4>
    </div>
    <div class="col-md-2 col-12 mb-3 ps-5 d-flex justify-content-between">
    </div>
</div>
<div class="col-xl-12">
   
    <!-- Tabs -->
    <div class="nav-align-top">
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item" style="font-size: small;">
                <button type="button" class="nav-link active showSingle" target="2" role="tab"
                    data-bs-toggle="tab" data-bs-target="#navs-pills-justified-diterima"
                    aria-controls="navs-pills-justified-diterima" aria-selected="false" style="padding: 8px 9px;">
                    <i class="tf-icons ti ti-receipt ti-xs me-1"></i>
                    Diterima 
                </button>
            </li>
            <li class="nav-item" style="font-size: small;">
                <button type="button" class="nav-link showSingle" target="3" role="tab"
                    data-bs-toggle="tab" data-bs-target="#navs-pills-justified-diproses"
                    aria-controls="navs-pills-justified-diproses" aria-selected="false" style="padding: 8px 9px;">
                    <i class="tf-icons ti ti-clock ti-xs me-1"></i>
                    Diproses 
                </button>
            </li>
            <li class="nav-item" style="font-size: small;">
                <button type="button" class="nav-link showSingle" target="4" role="tab"
                    data-bs-toggle="tab" data-bs-target="#navs-pills-justified-selesai"
                    aria-controls="navs-pills-justified-selesai" aria-selected="false" style="padding: 8px 9px;">
                    <i class="tf-icons ti ti-clipboard-check ti-xs me-1"></i>
                    Selesai 
                </button>
            </li>
        </ul>
    </div> 
     <div class="nav-align-top">
        <div class="tab-content mt-4">
            @foreach (['diterima', 'diproses', 'selesai'] as $key => $type)
            <div 
                class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                id="navs-pills-justified-{{ $type }}" role="tabpanel">
                <div class="card-datatable table-responsive">
                    <table class="table" id="{{ $type }}">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pemesan</th>
                                <th>Email</th>
                                <th>Produk</th>
                                <th>Kategori</th>
                                <th>No. Hp</th>
                                <th>Design</th>
                                <th>Catatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div class="modal fade" id="modal-pesanan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center d-block">
                <h5 class="modal-title" id="modal-title">Tambah Aktifitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="default-form" method="POST" enctype="multipart/form-data" action="{{ url('/admin/pesanan/update') }}">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-2 form-input">
                            <label for="status" class="form-label">Uodate Status Pesanan</label>
                            <select class="form-select select2" id="status" name="status"
                                data-placeholder="Pilih Kategori">
                                <option disabled selected>Pilih Kategori</option>
                                <option value="1">Diproses</option>
                                <option value="2">Selesai</option>
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
    $('.table').each(function() {
    let idElement = $(this).attr('id'); 
    let url = "{{ url('admin/pesanan/show')}}?type=" + idElement;
            
        $(this).DataTable({
            ajax: url,
            serverSide: false,
            processing: true,
            deferRender: true,
            type: 'GET',
            destroy: true,
            columns: [
                {
                    data: 'DT_RowIndex'
                },
                {
                    data: "nama_pemesan",
                    name: "nama_pemesan"
                },
                {
                    data: "email",
                    name: "email"
                },
                {
                    data: "produk.nama_produk",
                    name: "nama_produk"
                },
                {
                    data: 'kategori.deskripsi',
                    name: 'deskripsi' 
                },           
                {
                    data: "nohp",
                    name: "nohp"
                },
                {
                    data: 'design',
                    name: 'design'
                },
                {
                    data: 'catatan',
                    name: 'catatan'
                },
                {
                    data: 'action',
                    name: 'action'
                }

            ]
        });
    });

    function detail(e) {
        let id = e.attr('data-id');
        var url = `{{ url('admin/pesanan/unduh') }}/${id}`;
        window.open(url, '_blank');
    }

    function edit(e) {
        let id = e.attr('data-id');
        let action = `{{ url('admin/pesanan/update') }}/${id}`;
        var url = `{{ url('admin/pesanan/edit') }}/${id}`;

        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                $("#modal-title").html("Edit Aktifitas");
                $("#modal-button").html("Update Data");
                $('#modal-pesanan form').attr('action', action);
                $('#status').val(response.status);
                $('#modal-pesanan').modal('show');
            }
        });
    }


    jQuery(function() {
        jQuery('.showSingle').click(function() {
            jQuery('.targetDiv').hide('.cnt');
            jQuery('#div' + $(this).attr('target')).slideToggle();
        });
    });

    function validatePassword() {
        const passwordInput = document.getElementById('password');
        const feedback = passwordInput.nextElementSibling;

        if (passwordInput.value.length >= 8) {
            passwordInput.classList.remove('is-invalid');
            feedback.style.display = 'none';
        } else {
            passwordInput.classList.add('is-invalid');
            feedback.style.display = 'block';
        }
    }
</script>

<script src="{{url('assets/vendor/libs/sweetalert2/sweetalert2.js')}}"></script>
<script src="{{url('assets/js/extended-ui-sweetalert2.js')}}"></script>
@endsection
