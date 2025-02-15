@extends('admin-template.template')
@section('page_style')
<style>

</style>
@endsection
@section('content')
<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        @if ($banner !== null)
        <div class="carousel-inner mt-1">
            @foreach ($banner as $key => $b)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img src="{{ Storage::url($b->picture) }}" class="d-block w-100" alt="{{ $b->deskripsi }}" style="max-height: 300px; object-fit: cover;">
                </div>
            @endforeach
        </div>
        @else
        <div class="carousel-item active">
            <img src="{{ asset('background/banner.banner') }}" class="d-block w-100" alt="...">
        </div>
        @endif
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
<div class="col-12 mt-4">
    <div class="card h-100">
        <div class="card-header">
            <h5>Dashboard</h5>
        </div>
        <div class="card-body">
            <div class="row gy-3">
                <!-- Mahasiswa Magang -->
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-label-success me-3 p-2">
                            <i class="ti ti-users ti-sm" style="font-size: 30px !important;"></i>
                        </div>
                        <div class="card-info">
                            <h5 class="mb-0"></h5>
                            <p class="mb-0" style="font-size:18px;">Produk</p>
                        </div>
                    </div>
                </div>
                <!-- Universitas -->
                <div class="col-md-3 col-6">
                    <div class="d-flex align-items-center">
                        <div class="badge bg-label-success me-3 p-2">
                            <i class="ti ti-smart-home ti-sm" style="font-size: 30px !important;"></i>
                        </div>
                        <div class="card-info">
                            <h5 class="mb-0"></h5>
                            <p class="mb-0" style="font-size:18px;">Kategori</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection