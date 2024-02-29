@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>
            Feedback
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="p-4">
    <form method="post" action="{{ route('staff.feedback.save') }}">
        @csrf
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Product</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-gift text-muted"></i></span>
                {{ html()->select('product_id', $products->pluck('name', 'id'), old('product_id'))->class('form-control select2')->placeholder('Select') }}
            </div>
            @error('product_id')
            <small class="text-danger">{{ $errors->first('product_id') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Customer</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-people text-muted"></i></span>
                {{ html()->select('user_id', $customers->pluck('name', 'id'), old('user_id'))->class('form-control select2')->placeholder('Select') }}
            </div>
            @error('user_id')
            <small class="text-danger">{{ $errors->first('user_id') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Status</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-file text-muted"></i></span>
                {{ html()->select('status', array('Working' => 'Working', 'Not Working' => 'Not Workking'), old('status'))->class('form-control select2')->placeholder('Select') }}
            </div>
            @error('status')
            <small class="text-danger">{{ $errors->first('status') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Remarks</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-file text-muted"></i></span>
                <textarea class="form-control" name="remarks" placeholder="Remarks">{{ old('remarks') }}</textarea>
            </div>
            @error('remarks')
            <small class="text-danger">{{ $errors->first('remarks') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">SUBMIT</button>
        </div>
    </form>
</div>
<div class="p-4 table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>SL No</th>
                <th>Product</th>
                <th>Customer Name</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            @forelse($feedbacks as $key => $feed)
            <tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $feed->product->name }}</td>
                <td>{{ $feed->customer->name }}</td>
                <td>{{ $feed->status }}</td>
                <td>{{ $feed->remarks }}</td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
@endsection