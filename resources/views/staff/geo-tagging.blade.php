@extends("base")
@section("content")
<div class="p-3 shadow-sm bg-success danger-nav osahan-home-header">
    <div class="font-weight-normal mb-0 d-flex align-items-center">
        <h6 class="fw-normal mb-0 text-white d-flex align-items-center">
            <a class="text-white me-3 fs-4" onclick="window.history.back()" href="javascript:void(0)"><i class="bi bi-chevron-left"></i></a>
            GEO Tagging
        </h6>
        <div class="ms-auto d-flex align-items-center">
            <a class="toggle osahan-toggle fs-4 text-white ms-auto" href="#"><i class="bi bi-list"></i></a>
        </div>
    </div>
</div>
<div class="p-4">
    <form method="post" action="{{ route('staff.geo.tagging.save') }}">
        @csrf
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Product </label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-file text-muted"></i></span>
                {{ html()->select('product_id', $products->pluck('name', 'id'), old('product_id'))->class('form-control select2')->placeholder('Select') }}
            </div>
            @error('product_id')
            <small class="text-danger">{{ $errors->first('product_id') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Customer Name </label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-person text-muted"></i></span>
                <input type="text" class="form-control" name="customer_name" value="" placeholder="Customer Name">
            </div>
            @error('name')
            <small class="text-danger">{{ $errors->first('name') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Mobile </label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-phone text-muted"></i></span>
                <input type="text" class="form-control" maxlength="10" name="mobile" value="" placeholder="Mobile">
            </div>
            @error('mobile')
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1">Select Location</label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-geo-alt text-muted"></i></span>
                <input type="text" class="form-control" name="location" id="address" placeholder="Select Location">
            </div>
            <input type="hidden" name="latitude" id="latitude" value="" />
            <input type="hidden" name="longitude" id="longitude" value="" />
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">District </label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-file text-muted"></i></span>
                {{ html()->select('district_id', $districts->pluck('name', 'id'), old('district_id'))->class('form-control select2 selChange')->attribute('data-type', 'di')->placeholder('Select') }}
            </div>
            @error('district_id')
            <small class="text-danger">{{ $errors->first('district_id') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Local Body </label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-pin text-muted"></i></span>
                {{ html()->select('localbody_id', $lbs->pluck('name', 'id'), old('localbody_id'))->class('form-control lbody select2 selChange')->attribute('data-type', 'lb')->attribute('data-container', 'lbody')->placeholder('Select') }}
            </div>
            @error('localbody_id')
            <small class="text-danger">{{ $errors->first('localbody_id') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <label class="form-label text-muted small mb-1 req">Ward </label>
            <div class="input-group input-group-lg bg-white shadow-sm rounded overflow-hiddem">
                <span class="input-group-text bg-white"><i class="bi bi-file text-muted"></i></span>
                {{ html()->select('ward_id', $wards->pluck('name', 'id'), old('ward_id'))->class('form-control select2 ward')->attribute('data-container', 'ward')->placeholder('Select') }}
            </div>
            @error('ward_id')
            <small class="text-danger">{{ $errors->first('ward_id') }}</small>
            @enderror
        </div>
        <div class="mb-4">
            <button type="submit" class="btn btn-submit btn-success btn-lg w-100 shadow">SAVE</button>
        </div>
    </form>
</div>
@endsection