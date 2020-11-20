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

{{-- Add property Type --}}
<div class="modal fade" id="addPropertyType" tabindex="-1" role="dialog" aria-labelledby="addPropertyType"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property-type.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Type</label>
                        <input type="text" class="form-control" name="property_type" placeholder="Add property Type">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property Type</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add property Type --}}

{{-- Add property File --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Property Type File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('import-property-type')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Import Property Type</label>
                        <input type="file" class="form-control" name="property_type_file">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add property File --}}

<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Property Type Managment</h1>
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#addPropertyType">Add Property
            Type</a>
        <a href="{{ route('import-property-type') }}" class="btn btn-secondary float-right mr-2" data-toggle="modal"
            data-target="#import">Import</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Property Type Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($propertyTypes as $propertyType)
                    <tr>
                        <td>{{ $propertyType->id }}</td>
                        <td>{{ $propertyType->property_type }}</td>
                        <td>
                            <a href="{{ route('property-type.edit',$propertyType->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('property-type.destroy',$propertyType->id) }}"
                                onclick="return confirm('are you sure to delete property type')">
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
