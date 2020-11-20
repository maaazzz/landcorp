@extends('admin.layouts.master')
@section('styles')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/jquery.datetimepicker.min.css">
@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
<div class="col-md">
    <div class="card">
        <div class="card-header">
            Transactions
            <div class="col-md-3 offset-md-9">
                <form action="{{ route('transaction.filter') }}" method="GET">
                    <div class="form-group">
                        <label for="">Select Property</label>
                        <select name="name" id="property" class="form-control d-flex">
                            <option value="0" selected disabled>Select Property</option>
                            @foreach ($properties as $property)
                            <option value="{{ $property }}" data-id="{{ $property->id }}">{{$property->name}}</option>
                            @endforeach
                        </select>

                    </div>
                </form>

            </div>
            <a href="{{ route('transaction.listing') }}" class="btn btn-success  float-right mr-2">All
                Transactions</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('transaction.store') }}" method="post">
                    <table class="table table-bordered table-responsive" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Serial #</th>
                                <th>Room Name</th>
                                <th>Room Type</th>
                                <th>Property</th>
                                <th>Services</th>
                                <th>Status</th>
                                <th>GRA</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>

                        @csrf
                        <tbody id="results">
                        </tbody>
                    </table>
                    <input type='submit' value='Submit' class='btn btn-primary'>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/build/jquery.datetimepicker.full.min.js">
</script>
<script src="{{ asset('admin_scripts/transactions/transactions.js') }}"></script>




@endsection
