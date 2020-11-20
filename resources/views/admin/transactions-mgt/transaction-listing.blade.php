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






<div class="card">
    <div class="card-header">
        <h1 class="h3 mb-0 text-gray-800">Transactions Listing</h1>
        <a href="{{ route('transaction.index') }}" class="btn btn-info float-right btn-sm">Back</a>
    </div>

    <div class="card-body">


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Serial #</th>
                        <th>Property Name</th>
                        <th>Room Name</th>
                        <th>Room Type</th>
                        <th>Assigned Service</th>
                        <th>Status</th>

                    </tr>
                </thead>

                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->property->name }}</td>
                        <td>{{ $transaction->room_name }}</td>
                        <td>{{ $transaction->roomType->room_type}}</td>
                        <td>{{$transaction->service->service_name}}</td>
                        <td>{{$transaction->room->status ?? ''}}</td>

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
