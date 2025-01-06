@extends('partial.template')
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner mt-1">
                <div class="carousel-item active">
                    <img src="{{ asset('background/banner.png') }}" class="d-block w-100 " style="max-height: 300px; object-fit: cover;">
                </div>
            </div>
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
    <div>
        <!-- Icon container -->
        <div class="d-flex flex-wrap mt-5 ms-3" id="icons-container">
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                <div class="card-body">
                  <a href="{{url('polaroid')}}"><img src="{{ asset('icons/polaroid.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;"></a>
                  <p class="icon-name text-capitalize text-truncate mb-0">Polaroid</p>
                </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/cetak-buku.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">cetak buku</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/cetak-stiker.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">cetak stiker</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/cetak-poster.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">cetak poster</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/print-a3.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">print-a3</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/cetak-banner.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">cetak banner</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/cetak-brosur.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">cetak brosur</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/sablon.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">sablon</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/toner.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">toner</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/spare-part.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">spare part</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/kartu-nama.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">kartu nama</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/id-card.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">id card</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/kertas.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">kertas</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/sablon.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">sablon</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/mesin.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">mesin</p>
              </div>
            </div>
            <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
              <div class="card-body">
                <img src="{{ asset('icons/developer.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                <p class="icon-name text-capitalize text-truncate mb-0">sablon</p>
              </div>
            </div>
        </div>
        <!-- Icon container -->
    </div>

    <div class="footer-divider"></div>
    
        <div class="tab-content p-4">
            <div class="card border" >
                <div class="card-body text-center">
                    <h3 class="text-black">Tentang Syn Chroma Tech</h3>
                    <p class="text-black">Di Syn Chroma Tech, kami menawarkan beragam produk percetakan dan penyedia berbagai macam sparepart mesin percetakan. Dengan mengakses atau menggunakan situs web Syn Chroma Tech, Anda tidak diperbolehkan melanggar hukum, mengganggu atau merusak sistem, atau tindakan lain yang dapat merugikan Syn Chroma Tech.</p>
                </div>
            </div>
        </div>         
    
@endsection
