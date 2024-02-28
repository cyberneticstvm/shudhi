@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Ward Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ward Create</li>
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
                            {{ html()->form('POST', route('ward.save'))->class('theme-form')->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0 req" for="name">Ward Name </label>
                                        {{ html()->text('name', old('name'))->class('form-control')->placeholder('Ward Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <label class="col-form-label pt-0 req" for="localbody_id">Local Body </label>
                                        {{ html()->select('localbody_id', $lbs->pluck('name', 'id'), old('localbody_id'))->class('form-control select2')->placeholder('Select') }}
                                        @error('localbody_id')
                                        <small class="text-danger">{{ $errors->first('localbody_id') }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-danger" onclick="window.history.back();">Cancel</a>
                                <button class="btn btn-primary btn-submit" type="submit">Save</button>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
@endsection