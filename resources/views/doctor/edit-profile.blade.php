@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">My Profile</h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Edit Profile</h4>
                    </div>
                </div>
                <div class="card-body">
                        <form action="{{ route('doctor.update.profile') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group form-group-default">
                                        <label>Name</label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder="Doctor Name .." value="{{ old('name', $myDoctor[0]->name) }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="mb-2 text-center">
                                        <img src="{{ Storage::url($myDoctor[0]->image) }}" alt="" class="avatar-img rounded-circle" style="width: 150px">
                                    </div>
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
                                            <option {{ $myDoctor[0]->specialty == $specialty->value ? 'selected' : '' }} value="{{ $specialty->value }}">{{ $specialty->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Room</label>
                                        <select id="room" name="room" class="form-control">
                                            @for ($i = 1; $i < 100; $i++)
                                            <option {{ $myDoctor[0]->room == $i ? 'selected' : '' }} value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 pr-0">
                                    <div class="form-group form-group-default">
                                        <label>Email</label>
                                        <input id="email" name="email" type="email" class="form-control" placeholder="Email .." value="{{ old('email', $myDoctor[0]->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>No Phone</label>
                                        <input id="no_phone" name="no_phone" type="tel" class="form-control" placeholder="No Phone .." value="{{ old('no_phone', $myDoctor[0]->no_phone) }}">
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
