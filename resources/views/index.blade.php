@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <!--<a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>-->
            Home
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="p-3">
    <div class="row">
        <div class="col text-center p-3">
            <a href="{{ route('user.feedback') }}"><img src="{{ asset('/assets/img/shudhi/feedback.png') }}" class="img-fluid" /></a><br>
            <span class="text-success fw-bold">FEEDBACK</span>
        </div>
        <div class="col text-center p-3">
            <a href="{{ route('user.feedback') }}"><img src="{{ asset('/assets/img/shudhi/service.png') }}" class="img-fluid" /></a><br>
            <span class="text-success fw-bold">SERVICE REQUEST</span>
        </div>
    </div>
</div>
@include("bottom-nav")
@endsection