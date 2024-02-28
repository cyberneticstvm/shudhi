@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Staff Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Staff Create</li>
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
                            {{ html()->form('POST', route('user.save'))->class('theme-form')->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="col-form-label pt-0 req" for="name">Full Name </label>
                                        {{ html()->text('name', old('name'))->class('form-control')->placeholder('Full Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="mobile">Mobile </label>
                                        {{ html()->text('mobile', old('mobile'))->class('form-control')->maxlength('10')->placeholder('Mobile') }}
                                        @error('mobile')
                                        <small class="text-danger">{{ $errors->first('mobile') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="col-form-label pt-0 req" for="address">Address </label>
                                        {{ html()->text('address', old('address'))->class('form-control')->maxlength('10')->placeholder('Address') }}
                                        @error('address')
                                        <small class="text-danger">{{ $errors->first('address') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="password">Password </label>
                                        {{ html()->password('password', old('password'))->class('form-control')->maxlength('10')->placeholder('******') }}
                                        @error('password')
                                        <small class="text-danger">{{ $errors->first('password') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="role">Role </label>
                                        {{ html()->select('role', array('Admin' => 'Admin', 'Staff' => 'Staff'), old('role'))->class('form-control')->placeholder('Select') }}
                                        @error('role')
                                        <small class="text-danger">{{ $errors->first('role') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="status">Status </label>
                                        {{ html()->select('status', array('1' => 'Active', '0' => 'Inactive'), old('status'))->class('form-control')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
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