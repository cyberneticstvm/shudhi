@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Product Register</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Product register</li>
                    </ol>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-success" href="{{ route('product.create') }}">Create</a>
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
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Product Image</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody class="consultationTblBody">
                                @forelse($products as $key => $product)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td><a href="{{ asset($product->image) }}" target="_blank"><img src="{{ asset($product->image) }}" width="15%" /></a></td>
                                    <td>{{ $product->description }}</td>
                                    <td>{{ ($product->status == 1) ? 'Active' : 'Inactive' }}</td>
                                    <td class="text-center"><a href="{{ route('product.edit', encrypt($product->id)) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                                    <td class="text-center"><a href="{{ route('product.delete', encrypt($product->id)) }}" class="dlt"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
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