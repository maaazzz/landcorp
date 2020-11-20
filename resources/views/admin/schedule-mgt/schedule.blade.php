@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">



@endsection

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h1 class="h3 mb-0 text-gray-800">Schedule Managment</h1>
        {{-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#schedule">
            Add Schedule
        </button><br> --}}

        <a href="{{ route('schedule.create') }}" class="btn btn-primary float-right">Add Schedule</a>
        <a href="{{ route('show-calendar') }}" class="btn btn-info float-right mr-2">View Calendar</a>
    </div>
    <div class="card-body">
        @if(Session::has(' success')) <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
        @endif
        @if(Session::has('danger'))
        <div class="alert alert-danger">
            {{Session::get('danger')}}
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Property</th>
                        <th>Brand</th>
                        <th>Room Type</th>
                        <th>Service Type</th>
                        <th>Room Status</th>
                        <th>GRA</th>
                        <th>Supervisor</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <td>{{$schedule->id}}</td>
                        <td>{{$schedule->property->name ?? ''}}</td>
                        <td>{{$schedule->propertyBrand->property_brand ?? ''}}</td>
                        <td>{{$schedule->roomType->room_type ?? ''}}</td>
                        <td>{{$schedule->service->service_name ?? ''}}</td>
                        @if ($schedule->status == 1)
                        <td>vacant</td>
                        @endif
                        @if ($schedule->status == 2)
                        <td>vacant/clean</td>
                        @endif
                        @if ($schedule->status == 3)
                        <td>vacant/clean/inpection</td>
                        @endif
                        <td>{{$schedule->attendant->first_name ?? ''}}</td>
                        <td>{{$schedule->supervisor->supervisor_name ?? ''}}</td>
                        <td>
                            <a href="{{ route('schedule.edit',$schedule->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('schedule.destroy',$schedule->id) }}"
                                onclick="return confirm('are you sure to delete schedule')">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')



<!-- Page level plugins -->
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>

@endsection
