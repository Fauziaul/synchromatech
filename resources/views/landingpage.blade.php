@extends('partial.template')
@section('content')
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            @if ($banner && count($banner) > 0)
                <div class="carousel-inner mt-1">
                    @foreach ($banner as $key => $b)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ Storage::url($b->picture) }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;" alt="{{ $b->deskripsi }}">
                        </div>
                    @endforeach
                </div>
            @else
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('background/banner.png') }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;" alt="Default Banner">
                    </div>
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
    <div>
    <!-- Icon container -->
    
    <div class="card-body text-center">
        <h3 class="text-black mt-3">Kategori</h3>
            <div class="d-flex flex-wrap mt-5 ms-3 justify-content-center" id="icons-container">
              @foreach($kategori as $k) 
              <div class="card icon-card cursor-pointer text-center mb-4 mx-2">
                <div class="card-body">
                  
                  <a data-id='{{$k->id_kategori}}' onclick=detail($(this))><img src="{{ asset('storage/' . $k->picture) }}" class="d-block w-100" style="max-height: 300px; object-fit: cover;">
                  </a> 
                  <p class="icon-name text-capitalize text-truncate mb-0">{{$k?->deskripsi??'Kategori'}}</p>
                </div>
              </div>
              @endforeach
            </div>
      </div>
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
@section('page_script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

  function detail(element) {
    let idKategori = element.data('id');
    // Redirect ke halaman detail kategori
    window.location.href = '/kategori/' + idKategori;
    console.log(idKategori);
    
  }

</script>
@endsection
