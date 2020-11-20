@extends('admin.layouts.master')
@section('styles')

<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section('content')
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="col-md">
    <div class="card horizontal-scrollable">
        <div class="card-header">


            {{-- <a href="{{ route('transaction.listing') }}" class="btn btn-success float-right mr-2">All
            Transactions</a> --}}
        </div>

        <form action="{{ route('dispatch.store') }}" method="post">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Select Property</label>
                    <select name="property_id" id="props" class="form-control d-inline">
                        <option value="0" selected disabled>Select Property</option>
                        @foreach ($properties as $property)
                        <option value="{{ $property->id }}" data-id="{{ $property->id }}"
                            data-building-id="{{ $property->property_building_id}}"
                            data-brand-id="{{ $property->property_brand_id}}">{{$property->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">select date</label>
                    <input type="date" class="form-control d-flex" name="date" id="property">
                </div>
            </div>
            <div class="table-responsive ">
                <table class="table table-bordered order-column" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Building #</th>
                            <th>Unit Type</th>
                            <th>Unit</th>
                            <th>Service Type</th>
                            <th>Status</th>
                            <th>GRA 1</th>
                            {{-- do we need this column in database --}}
                            <th>GRA 2</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Add Room</th>
                            <th>Comments</th>
                            <th>Supervisor</th>
                            <th>Houseman</th>
                            <th>Total Time</th>
                            <th>Budget Time</th>
                            <th>Variance</th>
                        </tr>
                    </thead>

                    @csrf
                    <tbody id="results">
                    </tbody>
                </table>

            </div>
            <input type='submit' value='Submit' class='btn btn-primary float-right'>
        </form>
    </div>
</div>

@endsection
@section('scripts')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
<script scr="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>

<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('admin_scripts/transactions/dispatch.js') }}"></script>

{{-- hide datatables no data found msg --}}
<script>
    var table = $("#dataTable").on("draw.dt", function () {
$(this).find(".dataTables_empty").parents('tbody').empty();
}).DataTable({
    "responsive": true,
    "paging": false,
    "bFilter": false,
    "bInfo": false,
});


</script>


@endsection
