@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Report GEO Tagging</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Report Staff feedback</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-xl-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            {{ html()->form('POST', route('admin.report.geo.tagging.fetch'))->class('theme-form')->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="from_date">From Date </label>
                                        {{ html()->date('from_date', $input[0])->class('form-control') }}
                                        @error('from_date')
                                        <small class="text-danger">{{ $errors->first('from_date') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="to_date">To Date </label>
                                        {{ html()->date('to_date', $input[1])->class('form-control') }}
                                        @error('to_date')
                                        <small class="text-danger">{{ $errors->first('to_date') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="to_date">Local Body </label>
                                        {{ html()->select('local_body', $lbs, $input[2])->class('form-control select2') }}
                                        @error('local_body')
                                        <small class="text-danger">{{ $errors->first('local_body') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-danger" onclick="window.history.back();">Cancel</a>
                                <button class="btn btn-primary btn-submit" type="submit">Fetch</button>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="display table table-sm table-striped" id="basic-2">
                            <thead>
                                <th>SL No</th>
                                <th>Customer Name</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Ward</th>
                                <th>Local Body</th>
                                <th>District</th>
                                <th>Device</th>
                                <th>Status</th>
                                <th>Remarks</th>
                                <th>Staff</th>
                                <th>Date</th>
                            </thead>
                            <tbody class="consultationTblBody">
                                @forelse($data as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->customer?->customer_name }}</td>
                                    <td>{{ $item->customer?->mobile }}</td>
                                    <td>{{ $item->customer?->location }}</td>
                                    <td>{{ $item->customer?->ward?->name }}</td>
                                    <td>{{ $item->customer?->localbody?->name }}</td>
                                    <td>{{ $item->customer?->district?->name }}</td>
                                    <td>{{ $item->customer?->product?->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->remarks }}</td>
                                    <td>{{ $item->user?->name }}</td>
                                    <td>{{ $item->created_at->format('d, M Y') }}</td>
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