@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Pasien</h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $doctor->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                            <div class="row g-0" style="border-radius: .5rem;">
                                <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="{{ Storage::url($doctor->image) }}"
                                    alt="Avatar" class="img-fluid rounded-circle my-5" style="width: 80px;" />
                                <h5>Marie Horwitz</h5>
                                <p>Web Designer</p>
                                <i class="far fa-edit mb-5"></i>
                                </div>
                                <div class="col-md-8">
                                <div class="card-body p-4">
                                    <h6>Information</h6>
                                    <hr class="mt-0 mb-4">
                                    <div class="row pt-1">
                                    <div class="col-6 mb-2">
                                        <h6>Name</h6>
                                        <p class="text-muted">{{ $doctor->name }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <h6>Specialty</h6>
                                        <p class="text-muted">{{ $doctor->specialty }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <h6>Email</h6>
                                        <p class="text-muted">{{ $doctor->email }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <h6>No Phone</h6>
                                        <p class="text-muted">{{ $doctor->no_phone }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <h6>Room</h6>
                                        <p class="text-muted">{{ $doctor->room }}</p>
                                    </div>
                                    <div class="col-6 mb-2">
                                        <h6>Status</h6>
                                        <button class="btn btn-success btn-sm">
                                            Active
										</button>
                                    </div>
                                    </div>
                                    </div>
                                    {{-- <div class="d-flex justify-content-start">
                                        <a href="{{ route('admin.appointment.approved', $appointment) }}" type="button" class="btn btn-primary btn-sm" style="margin-right: 5px">Approved</a>

                                        <form action="{{ route('admin.appointment.canceled', $appointment) }}" method="post">
                                            @csrf
                                            @method('patch')
                                            <input type = "hidden" name = "canceled" value = "canceled"></input>
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:white">Reject</button>
                                        </form>
                                    </div> --}}
                                </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
