@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Product Create</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product Create</li>
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
                            {{ html()->form('POST', route('product.save'))->class('theme-form')->acceptsFiles()->open() }}
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label pt-0 req" for="name">Product Name </label>
                                        {{ html()->text('name', old('name'))->class('form-control')->placeholder('Product Name') }}
                                        @error('name')
                                        <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="category_id">Category </label>
                                        {{ html()->select('category_id', $cats->pluck('name', 'id'), old('category_id'))->class('form-control')->placeholder('Select') }}
                                        @error('category_id')
                                        <small class="text-danger">{{ $errors->first('category_id') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label pt-0 req" for="status">Status </label>
                                        {{ html()->select('status', array('1' => 'Active', '0' => 'Inactive'), old('status'))->class('form-control')->placeholder('Select') }}
                                        @error('status')
                                        <small class="text-danger">{{ $errors->first('status') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label pt-0 req" for="price">Price</label>
                                        {{ html()->number('price', old('price'))->class('form-control')->placeholder('0.00') }}
                                        @error('price')
                                        <small class="text-danger">{{ $errors->first('price') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-10">
                                        <label class="col-form-label pt-0 req" for="image">Product Image (450px X 450px)</label>
                                        {{ html()->file('image', '')->class('form-control') }}
                                        <small class="form-text text-muted">Max file size should be less than 1MB</small>
                                        @error('image')
                                        <small class="text-danger">{{ $errors->first('image') }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label pt-0 req" for="status">Product Description </label>
                                        {{ html()->textarea('description', old('description'))->class('form-control editor')->placeholder('Product Description') }}
                                        @error('description')
                                        <small class="text-danger">{{ $errors->first('description') }}</small>
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