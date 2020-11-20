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
                <h5 class="modal-title" id="exampleModalLabel">Import Attendant CSV File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('import-attendant') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Upload File:</label>
                        <input type="file" class="form-control" name="attendant_file">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Import</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end of import csv modal --}}



<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Attendant Management</h1>
        <a href="" class="btn btn-secondary float-right" data-toggle="modal" data-target="#import">Import CSV</a>
        <a href="{{ route('attendant.create') }}" class="btn btn-primary float-right mr-2">Add Attendant</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Position</th>
                        <th>Gender</th>
                        <th>City,State</th>
                        <th>Email</th>
                        <th>Cellular</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($attendants as $attendant)
                    <tr>
                        <td>{{ $attendant->id }}</td>
                        <td>{{ $attendant->first_name }}</td>
                        <td>{{ $attendant->last_name }}</td>
                        <td>{{ $attendant->position }}</td>
                        <td>{{ $attendant->gender == 0 ? 'Male' : 'Female' }}</td>
                        <td>{{ $attendant->city}}, {{ $attendant->state }}</td>
                        <td>{{ $attendant->email}}</td>
                        <td>{{ $attendant->cellular}}</td>
                        <td>
                            <a href="{{ route('attendant.edit',$attendant->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('attendant.destroy',$attendant->id) }}"
                                onclick="return confirm('are you sure to delete attendant')">
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
