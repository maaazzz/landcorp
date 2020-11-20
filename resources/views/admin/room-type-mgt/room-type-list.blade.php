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

{{-- Add Room Type --}}
<div class="modal fade" id="addRoomType" tabindex="-1" role="dialog" aria-labelledby="addRoomType" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('room-type.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Room Type</label>
                        <input type="text" class="form-control" name="room_type" placeholder="Add Room Type">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Room Type</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Room Type --}}

{{-- Add property Building --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Room Types</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('room-type.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Upload Room Type</label>
                        <input type="file" class="form-control" name="room_type_file">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add Property Building --}}





<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Room Type Managment</h1>
        <td>
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#addRoomType">Add
                Room Type</a>
            <a href="" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#import">
                Import</a>
        </td>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Room Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roomTypes as $roomType)
                    <tr>
                        <td>{{ $roomType->id }}</td>
                        <td>{{ $roomType->room_type }}</td>
                        <td>
                            <a href="{{ route('room-type.edit',$roomType->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('room-type.destroy',$roomType->id) }}"
                                onclick="return confirm('are you sure to delete room type')">
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
