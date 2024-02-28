@extends("admin.base")
@section("content")
<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-6">
                    <h3>Staff Register</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Staff Register</li>
                    </ol>
                </div>
                <div class="col-sm-6 text-end">
                    <a class="btn btn-success" href="{{ route('user.create') }}">Create</a>
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
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody class="consultationTblBody">
                                @forelse($users as $key => $user)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->status == 1 ? 'Active' : 'Inactive' }}</td>
                                    <td class="text-center"><a href="{{ route('user.edit', encrypt($user->id)) }}"><i class="fa fa-edit text-warning fa-lg"></i></a></td>
                                    <td class="text-center"><a href="{{ route('user.delete', encrypt($user->id)) }}" class="dlt"><i class="fa fa-trash text-danger fa-lg"></i></a></td>
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