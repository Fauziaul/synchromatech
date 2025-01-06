@extends('partial.template')
@section('content')

<div class="ms-4 mt-4 mb-4">
    <h4>Polaroid</h4>
</div>

<div class="tab-content p-0">
    <div class="tab-pane fade show active" id="navs-pills-justified-terbaru" role="tabpanel">
        <div class="row" style="margin-left:150px; margin-right:80px">
            <div class="col-4 mt-4">
                <div class="card border" style="width: 100%;">
                    <div class="card-body" style="display: flex;  height: auto; flex-direction: column; flex-shrink: 0;">
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <figure class="image" style="border-radius: 0%;"><img style="border-radius: 0%;" src="{{ asset('front/assets/img/icon_lowongan.png')}}" alt="admin.upload">
                                    </figure>
                                </div>
                            </div>
                            <div class="col-12">
                                <p style="text-align: left !important; font-size:18px; margin-bottom: 0px;">PT Wings
                                    Surya</p>
                            </div>
                        </div>
                        <h2 class="mb-3" style="text-align: left !important; -webkit-line-clamp: 1;text-overflow: ellipsis; overflow: hidden; display: -webkit-box; -webkit-box-orient: vertical; word-break: break-word; margin: top 100px;">
                            Human Resources</h2>
                        <div class="location mb-3"><i class="ti ti-currency-dollar" style="padding-right :5px; padding-bottom:5px;"></i>Rp 1.000.000 - 5.000.000
                        </div>
                    </div>
                </div>
            </div>   
        </div>   
    </div>   
</div>   
@endsection