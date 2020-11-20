@extends('admin.layouts.master')

@section('styles')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if(Session::has('danger'))
<div class="alert alert-danger">
    {{Session::get('danger')}}
</div>
@endif

{{-- Add Room --}}
<div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="addRoom" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('room.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Select Property</label>
                        <select name="room_type_id" id="" class="form-control">
                            @foreach ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->name }}</option>
                            @endforeach
                        </select>
                        <label for="">Room Type</label>
                        <select name="room_type_id" id="" class="form-control">
                            @foreach ($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}">{{ $roomType->room_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Add Room</label>
                        <input type="text" class="form-control" name="room_name" placeholder="Add Room">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Room</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add Room --}}



{{-- Add room file --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Rooms</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('room.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Upload File</label>
                        <input type="file" class="form-control" name="room_file">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add room file --}}





<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Room Managment</h1>
        <td>
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#addRoom">Add
                Room</a>
            <a href="" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#import">Import
            </a>
        </td>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Room Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($rooms as $room)
                    <tr>
                        <td>{{ $room->id }}</td>
                        <td>{{ $room->room_name }}</td>
                        <td>
                            <a href="{{ route('room.edit',$room->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('room.destroy',$room->id) }}"
                                onclick="return confirm('are you sure to delete room')">
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
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection
