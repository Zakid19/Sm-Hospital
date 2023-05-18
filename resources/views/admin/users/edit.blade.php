@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data User</h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                </div>
                <div class="card-body">
                        <p class="small">Create a new row using this form, make sure you fill them all</p>
                        <form action="{{ route('admin.user.update', $user) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Name</label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Doctor Name .." value="{{ old('name', $user->name) }}">
                                        @error('name')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email .." value="{{ old('email', $user->email) }}">
                                        @error('email')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Role</label>
                                        <select id="role_id" name="role_id" class="form-control">
                                            @foreach($roles as $role)
                                            <option {{ $user->role_id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="mt-2 text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('admin.doctor.list') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
