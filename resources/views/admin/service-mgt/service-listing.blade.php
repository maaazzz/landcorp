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

{{-- Add Service --}}
<div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="service" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('service.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Service Name</label>
                        <input type="text" class="form-control" name="service_name" placeholder="Add Service">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Service</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Service --}}

{{-- Add service files --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="import">Import Rooms</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('service.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Upload File</label>
                        <input type="file" class="form-control" name="service_file">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add service files --}}






<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Service Management</h1>
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#service">Add Service</a>
        <a href="" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#import">Import</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Service Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->service_name }}</td>
                        <td>
                            <a href="{{ route('service.edit',$service->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('service.destroy',$service->id) }}"
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
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection
