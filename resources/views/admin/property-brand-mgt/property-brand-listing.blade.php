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

{{-- Add property brand --}}
<div class="modal fade" id="addPropertyBrand" tabindex="-1" role="dialog" aria-labelledby="addPropertyBrand"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property-brand.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Brand</label>
                        <input type="text" class="form-control" name="property_brand" placeholder="Add property brand">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property brand</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add property brand --}}


{{-- Add property brand File --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="import" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Brand File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('import-property-brand')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Upload Property Brand File</label>
                        <input type="file" class="form-control" name="property_brand_file">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add property brand file --}}


<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Property Brand Managment</h1>
        <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#addPropertyBrand">Add
            Property Brand</a>
        <a href="{{ route('import-property-brand') }}" class="btn btn-secondary float-right mr-2" data-toggle="modal"
            data-target="#import">
            Import</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Property Brand</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->property_brand }}</td>
                        <td>
                            <a href="{{ route('property-brand.edit',$brand->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('property-brand.destroy',$brand->id) }}"
                                onclick="return confirm('are you sure to delete brand')">
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
