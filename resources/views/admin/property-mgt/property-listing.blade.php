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


{{-- Import CSV Modal --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Property CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('import-property')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Upload File:</label>
                        <input type="file" class="form-control" name="property_file" placeholder="Add property name">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Import CSV</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end of add property --}}




<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Property Managment</h1>
        {{-- <a href="" class="btn btn-secondary float-right" data-toggle="modal" data-target="#import">Import CSV</a> --}}
        <a href="{{ route('property.create') }}" class="btn btn-primary float-right mr-2">Add
            Property</a>
    </div>

    <div class="card-body">


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Property Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->name }}</td>
                        <td>
                            <a href="{{ route('property.edit',$property->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('property.destroy',$property->id) }}"
                                onclick="return confirm('are you sure to delete property')">
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
