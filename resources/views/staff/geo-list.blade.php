@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>
            GEO Tagging List
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="p-4 table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>SL No</th>
                <th>Product</th>
                <th>Customer Name</th>
                <th>Mobile</th>
                <th>Location</th>
                <th>Ward</th>
                <th>Local Body</th>
                <th>District</th>
            </tr>
        </thead>
        <tbody>
            @forelse($geos as $key => $geo)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $geo->product->name }}</td>
                <td>{{ $geo->customer_name }}</td>
                <td>{{ $geo->mobile }}</td>
                <td>{{ $geo->location }}</td>
                <td>{{ $geo->ward->name }}</td>
                <td>{{ $geo->localbody->name }}</td>
                <td>{{ $geo->district->name }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
@endsection