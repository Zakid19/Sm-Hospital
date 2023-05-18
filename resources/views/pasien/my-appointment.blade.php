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
                        @if (empty(Auth::user()->appointment))
                        <h4 class="card-title">{{ Auth::user()->name }}</h4>
                        @else
                        <h4 class="card-title">{{ Auth::user()->appointment->fullname }}</h4>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover table table-head-bg-primary mt-4" >
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($myappointment as $data)
                                <tr>
                                    <td>{{ $data->doctor->name }}</td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ Str::limit($data->message, 50) }}</td>
                                    <td>
                                        @if ($data->status == 'approved')
                                        <button class="btn btn-success btn-sm">
											Approved
										</button>
                                        @elseif ($data->status == 'canceled')
                                        <button class="btn btn-danger btn-sm">
                                            Canceled
										</button>
                                        @else
                                        <button class="btn btn-warning btn-sm">
											Progres
										</button>
                                        @endif

                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a type="button" href="{{ route('appointment.edit', $data) }}" class="btn btn-link btn-primary btn-lg"
                                            data-toggle="tooltip" title="" data-original-title="Edit Appointment">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('appointment.cancel', $data) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Cancel Appointment">
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
