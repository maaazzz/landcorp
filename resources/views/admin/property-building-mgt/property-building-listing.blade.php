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
{{-- Add property Building --}}
<div class="modal fade" id="addPropertyBuilding" tabindex="-1" role="dialog" aria-labelledby="addPropertyBuilding"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Building</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property-building.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Building</label>
                        <input type="text" class="form-control" name="property_building"
                            placeholder="Add property building">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Add Property Building</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add Property Building --}}


{{-- Add property Building --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Property Building</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('building.import') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Building</label>
                        <input type="file" class="form-control" name="property_building_file">
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm float-right">Add Property Building</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add Property Building --}}

<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Property Bulding Managment</h1>
        <td>
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#addPropertyBuilding">Add
                Property
                Building</a>
            <a href="{" class="btn btn-secondary float-right mr-2" data-toggle="modal" data-target="#import">
                Import
            </a>
        </td>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Property Building</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($propertyBuildings as $building)
                    <tr>
                        <td>{{ $building->id }}</td>
                        <td>{{ $building->building_name }}</td>
                        <td>
                            <a href="{{ route('property-building.edit',$building->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('property-building.destroy',$building->id) }}"
                                onclick="return confirm('are you sure to delete property bulding')">
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
