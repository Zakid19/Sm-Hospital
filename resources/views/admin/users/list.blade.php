@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data User</h4>
        {{-- <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="#">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Tables</a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="#">Datatables</a>
            </li>
        </ul> --}}
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">User List</h4>
                        {{-- <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Doctor
                        </button> --}}
                    </div>
                </div>
                <div class="card-body">
                    <!-- Modal -->
                    {{-- <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        New</span>
                                        <span class="fw-light">
                                            Row
                                        </span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">Create a new row using this form, make sure you fill them all</p>
                                    <form action="{{ route('admin.doctor.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Name</label>
                                                    <input id="name" name="name" type="text" class="form-control" placeholder="Doctor Name ..">
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Image</label>
                                                    <input id="image" name="image" type="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Specialty</label>
                                                    <select id="specialty" name="specialty" class="form-control">
                                                        @foreach(App\Enums\DoctorSpecialty::cases() as $specialty)
                                                        <option value="{{ $specialty->value }}">{{ $specialty->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Room</label>
                                                    <select id="room" name="room" class="form-control">
                                                        @for ($i = 1; $i < 100; $i++)
                                                        <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 pr-0">
                                                <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email ..">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>No Phone</label>
                                                    <input id="no_phone" name="no_phone" type="tel" class="form-control" placeholder="No Phone ..">
                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> --}}

                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover table table-head-bg-primary mt-4" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->role_id == '1')
                                        <button class="btn btn-danger btn-sm">
                                            Admin
										</button>
                                        @elseif ($user->role_id == '2')
                                        <button class="btn btn-warning btn-sm">
                                            Doctor
										</button>
                                        @elseif ($user->role_id == '3')
                                        <button class="btn btn-success btn-sm">
                                            Pasien
										</button>
                                        @endif
                                        {{-- {{ $user->role()->get()->implode('name') }} --}}
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" href="{{ route('admin.user.edit', $user) }}" class="btn btn-link btn-primary btn-lg"
                                            data-toggle="tooltip" title="" data-original-title="Edit User">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.user.delete', $user) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
