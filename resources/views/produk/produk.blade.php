@extends('partial.template')
@section('content')

<div class="ms-4 mt-4 mb-2">
    <h4>Kategori / {{$kategori->deskripsi}}</h4>
    {{-- <div class="col-12">
        <figure class="image" style="width: 100%; margin: 0;">
            <a ><img src="{{asset('storage/' . $kategori->picture)}}" alt="PT Wings Surya" class="custom-image" /></a>
        </figure>
    </div> --}}
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="navs-pills-justified-terbaru">
        <div class="row p-4 d-flex justify-content-center" style="max-width: 100%; margin: auto;">
            <!-- Card 1 -->
            @foreach($produk as $p)
            <div class="col-3 mt-4">
                <div class="card icon-card cursor-pointer text-center border">
                    
                    <div class="card-body">
                        
                        <div class="col-12">
                            <figure class="image" style="width: 100%; margin: 0;">
                                <a data-id="{{$p->id_produk}}" onclick=order($(this)) ><img src="{{asset('storage/' . $p->picture)}}" alt="PT Wings Surya" class="custom-image" /></a>
                                </figure>
                        </div>
                        <div class="col-12 mt-3">
                            <p style="text-align: center; font-size: 18px; margin-bottom: 0;">{{$p->nama_produk}}</p>
                            <p style="text-align: center; color:red; font-size: 16px; margin-bottom: 0;">Mulai dari Rp. {{$p->harga}}</p>
                        </div>
                            <a data-id="{{$p->id_produk}}" onclick=order($(this)) class="btn btn-secondary mt-2">Pesan</a>
                    </div>
                   
                </div>
            </div>
            @endforeach
        </div> 
    </div>
</div>
@endsection
@section('page_script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

  function order(element) {
    let idProduk = element.data('id');
    // Redirect ke halaman detail kategori
    window.location.href = '/order/' + idProduk;
    console.log(idProduk);
    
  }

</script>
@endsection