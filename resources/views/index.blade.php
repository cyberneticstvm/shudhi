@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <!--<a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>-->
            Products
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="border-bottom border-top px-3 d-flex align-items-center justify-content-between">
    <ul class="nav home-tabs" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Best Selling Products</button>
        </li>
    </ul>
</div>
@include("bottom-nav")
@endsection