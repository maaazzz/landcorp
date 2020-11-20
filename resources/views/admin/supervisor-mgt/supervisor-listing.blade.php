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
{{-- Add supervisor --}}
<div class="modal fade" id="supervisor" tabindex="-1" role="dialog" aria-labelledby="supervisor" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supervisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('supervisor.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Supervisor Name</label>
                        <input type="text" class="form-control" name="supervisor_name" placeholder="Supervisor Name">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Supervisor</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End supervisor --}}

<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Supervisor Managment</h1>
        <td>
            <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#supervisor">Add
                Supervisor</a>
        </td>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Supervisor Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($supervisors as $supervisor)
                    <tr>
                        <td>{{ $supervisor->id }}</td>
                        <td>{{ $supervisor->supervisor_name }}</td>
                        <td>
                            <a href="{{ route('supervisor.edit',$supervisor->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="{{ route('supervisor.destroy',$supervisor->id) }}"
                                onclick="return confirm('are you sure to delete supervisor')">
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
