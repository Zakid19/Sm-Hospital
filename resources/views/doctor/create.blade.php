@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Doctors</h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Doctors List</h4>
                        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                            <i class="fa fa-plus"></i>
                            Add Doctor
                        </button>
                    </div>
                </div>
                <div class="card-body">
                        <p class="small">Create a new row using this form, make sure you fill them all</p>
                        <form action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Name</label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Doctor Name .." value="{{ old('name') }}">
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
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email .." value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>No Phone</label>
                                        <input id="no_phone" name="no_phone" type="tel" class="form-control" placeholder="No Phone .." value="{{ old('no_phone') }}">
                                    </div>
                                </div>
                            </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('admin.doctor.list') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
