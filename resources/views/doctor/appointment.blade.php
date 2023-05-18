@extends('layouts.admin')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Data Appointment</h4>
    </div>
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Appointment List</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add-row" class="display table table-striped table-hover table table-head-bg-primary mt-4" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>No Phone</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{ $appointment->fullname }}</td>
                                    <td>{{ $appointment->no_phone }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>
                                        @if ($appointment->status == 'approved')
                                        <button class="btn btn-success btn-sm">
											Approved
										</button>
                                        @elseif ($appointment->status == 'canceled')
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

                                            <a type="button" href="{{ route('doctor.appointment.show', $appointment) }}" class="btn btn-link btn-success btn-lg"
                                            data-toggle="tooltip" title="" data-original-title="Cek Data">
                                                <i class="fas fa-money-check"></i>
                                            </a>
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
