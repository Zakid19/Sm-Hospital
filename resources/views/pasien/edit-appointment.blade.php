@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">My Appointment</h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">My Appointment Edit</h4>
                    </div>
                </div>
                <div class="card-body">
                        <form action="{{ route('updateAppointment', $appointment) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Fullname</label>
                                        <input id="fullname" name="fullname" type="text" class="form-control" value="{{ old('name', $appointment->fullname) }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input id="date" name="date" type="datetime-local" class="form-control" value="{{ old('name', $appointment->date) }}">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="comment">Message</label>
                                        <textarea class="form-control" id="message" name="message" rows="5">{{ $appointment->message }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                    <div class="modal-footer no-bd">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('my-appointment') }}" type="button" class="btn btn-danger" data-dismiss="modal">Cancel</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
