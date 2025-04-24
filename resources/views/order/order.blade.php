@extends('order.template')
@section('page_style')
<style>
#preview {
    object-fit: cover; /* Menjaga proporsi gambar tetap utuh dalam lingkaran */
    width: 150px; /* Lebar gambar */
    height: 150px; /* Tinggi gambar */
    }

</style>
@endsection
@section('main')
<div class="ms-4 mt-4 mb-2">    
</div>
<div class="tab-content">
    <div class="tab-pane fade show active" id="navs-pills-justified-terbaru">
        <div class="row p-4 d-flex justify-content-center" style="max-width: 100%; margin: auto;">
            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                <div class="container-xxl flex-grow-1 container-p-y">
                <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Produk/</span> {{$produk->nama_produk}}</h4>
                <!-- Basic Layout -->
                    <div class="row">
                        <div class="col-xl">
                            <div class="card mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Form Pesanan{{$produk->nama_produk}} </h5>
                                    <small class="text-muted float-end"></small>
                                    <hr class="mt-0" />
                                </div>
                                <div class="card-body">
                                    <div class="mb-3 d-flex justify-content-center align-items-center" >
                                        <img src="{{ Storage::url('' .$produk?->picture?? '') }}" alt="profile" class=" mb-3 pt-1 mt-4" name="picture" id="preview">
                                    </div>
                                    <div class="row">
                                        <!-- FormValidation -->
                                        <div class="col-12">
                                            <div class="card-body">
                                              <div class="bs-stepper wizard-numbered mt-2">
                                                <div class="bs-stepper-header">
                                                  <div class="step" data-target="#detail-pesanan">
                                                    <button type="button" class="step-trigger">
                                                      <span class="bs-stepper-circle">1</span>
                                                      <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">Detail Pemesan</span>
                                                        <span class="bs-stepper-subtitle">Detail Pemesan</span>
                                                      </span>
                                                    </button>
                                                  </div>
                                                  <div class="line">
                                                    <i class="ti ti-chevron-right"></i>
                                                  </div>
                                                  <div class="step" data-target="#personal-info">
                                                    <button type="button" class="step-trigger">
                                                      <span class="bs-stepper-circle">2</span>
                                                      <span class="bs-stepper-label">
                                                        <span class="bs-stepper-title">Detail Pesanan</span>
                                                        <span class="bs-stepper-subtitle">Detail Pesanan</span>
                                                      </span>
                                                    </button>
                                                  </div>
                                                </div>
                                                <hr>
                                                <div class="bs-stepper-content">
                                                  <form method="POST" action="{{ url('/buat-pesanan') }}" class="row g-3  default-form">
                                                    @csrf
                                                    <input type="hidden" name="id_produk" value="{{ $produk->id_produk }}">
                                                    <!-- Account Details -->
                                                    <div id="detail-pesanan" class="content">
                                                      <div class="content-header mb-3">
                                                        <h6 class="mb-0">Detail Pemesan</h6>
                                                      </div>
                                                      <div class="row g-3">
                                                        <div class="col-sm-6 form-input">
                                                          <label class="form-label" for="Pemesan">Pemesan</label>
                                                          <input type="text" id="Pemesan" class="form-control" name="pemesan" placeholder="Alfrdo" />
                                                          <div class="invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-sm-6 form-input">
                                                          <label class="form-label" for="email">Email</label>
                                                          <input type="email" id="email" name="email" class="form-control" placeholder="order@gmail.com" />
                                                          <div class="invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-sm-6 form-input">
                                                          <label class="form-label" for="nohp">NO. HP</label>
                                                          <input type="text" id="nohp" name="nohp" class="form-control" placeholder="658 799 8941" />
                                                          <div class="invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-sm-6 form-input">
                                                          <label class="form-label" for="alamat">Alamat Pemesan</label>
                                                          <input type="text" id="alamat" name="alamat" class="form-control" placeholder="jakarta"/>
                                                          <div class="invalid-feedback"></div>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                          <button class="btn btn-label-secondary btn-prev" disabled>
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                          </button>
                                                          <button type="button" class="btn btn-primary btn-next">
                                                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Next</span>
                                                            <i class="ti ti-arrow-right"></i>
                                                          </button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- Personal Info -->
                                                    <div id="personal-info" class="content">
                                                      <div class="content-header mb-3">
                                                        <h6 class="mb-0">Detail Pesanan</h6>
                                                      </div>
                                                      <div class="row g-3">
                                                        <div class="col-sm-6">
                                                          <label class="form-label" for="id_kategori">Kategori Pesanan</label>
                                                          <input type="hidden" name="id_kategori" value="{{ $produk->id_kategori }}">
                                                          <input type="text" class="form-control" value="{{ $produk->kategori->deskripsi }}" disabled />
                                                        </div>
                                                        <div class="col-sm-6">
                                                          <label class="d-block form-label">Design Logo</label>
                                                          <div class="form-check mb-2">
                                                              <input type="radio" id="design-sendiri" name="design" value="sendiri" class="form-check-input" />
                                                              <label class="form-check-label" for="design-sendiri">Design Sendiri</label>
                                                          </div>
                                                          <div class="form-check">
                                                              <input type="radio" id="terima-jadi" name="design" value="terima-jadi" class="form-check-input" />
                                                              <label class="form-check-label" for="terima-jadi">Terima Jadi</label>
                                                          </div>
                                                        </div>
                                                        <hr>
                                                        <div class="content-header mb-3">
                                                          <h6 class="mb-0">Ukuran Pesanan</h6>
                                                        </div>
                                                        <div class="col-md-6">
                                                          <div class="row mb-3">
                                                            <div class="col-sm-4">
                                                              <label class="form-label" for="m">M</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <input type="text" id="m" name="m" class="form-control">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <div class="col-sm-4">
                                                              <label class="form-label" for="s">S</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <input type="text" id="s" name="s" class="form-control">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <div class="col-sm-4">
                                                              <label class="form-label" for="l">L</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <input type="text" id="l" name="l" class="form-control">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <div class="col-sm-4">
                                                              <label class="form-label" for="xl">XL</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <input type="text" id="xl" name="xl" class="form-control">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <div class="col-sm-4">
                                                              <label class="form-label" for="xxl">XXL</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <input type="text" id="xxl" name="xxl" class="form-control">
                                                            </div>
                                                          </div>
                                                          <div class="row mb-3">
                                                            <div class="col-sm-4">
                                                              <label class="form-label" for="xxxl">XXXL</label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                              <input type="text" id="xxxl" name="xxxl" class="form-control">
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                          <label class="form-label" for="catatan">Catatan</label>
                                                          <textarea id="catatan" name="catatan" class="form-control" placeholder="lorem ipsum"></textarea>
                                                        </div>
                                                        <div class="col-12 d-flex justify-content-between">
                                                          <button class="btn btn-label-secondary btn-prev">
                                                            <i class="ti ti-arrow-left me-sm-1 me-0"></i>
                                                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                                                          </button>
                                                          <button type="submit" class="btn btn-success">Buat Pesanan</button>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    
                                                    </div>
                                                  </form>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        <!-- /FormValidation -->
                                      </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_script')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
@endsection