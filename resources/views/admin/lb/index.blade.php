@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>District Register</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">District Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="display table table-sm table-striped" id="basic-2">
                            <thead>
                                <th>SL No</th>
                                <th>Local Body Name</th>
                                <th>Local Body Name</th>
                                <th>Local Body Type</th>
                                <th>District</th>
                            </thead>
                            <tbody class="consultationTblBody">
                                @forelse($lbs as $key => $lb)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $lb->name }}</td>
                                    <td>{{ $lb->mallu_name }}</td>
                                    <td>{{ $lb->type }}</td>
                                    <td>{{ $lb->district->name }}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection