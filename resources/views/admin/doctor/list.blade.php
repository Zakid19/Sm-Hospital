@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Doctors</h4>
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
                        <h4 class="card-title">Doctors List</h4>
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
                                    <th>Image</th>
                                    <th>Speciality</th>
                                    <th>Room</th>
                                    <th>No Phone</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($doctors as $doc)
                                <tr>
                                    <td>{{ $doc->name }}</td>
                                    <td>
                                        <div class="avatar">
                                            <img src="{{ Storage::url($doc->image) }}" alt="Doctor Image" class="avatar-img rounded-circle">
                                        </div>
                                    </td>
                                    <td>{{ $doc->specialty }}</td>
                                    <td>{{ $doc->room }}</td>
                                    <td>{{ $doc->no_phone }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" href="{{ route('admin.doctor.detail', $doc) }}" class="btn btn-link btn-success btn-lg"
                                            data-toggle="tooltip" title="" data-original-title="Cek Data">
                                                <i class="fas fa-money-check"></i>
                                            </a>

                                            <a type="button" href="{{ route('admin.doctor.edit', $doc)  }}" class="btn btn-link btn-primary btn-lg"
                                            data-toggle="tooltip" title="" data-original-title="Edit Doctor">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.doctor.delete', $doc) }}" method="post">
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
