@extends('admin.layouts.master')


@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>


{{-- include modals --}}
@include('admin.property-mgt.modals')


<div class="row">
    <div class="col-md">

        <table class="table ">
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <thead>
                <tr>
                    <th>Add Property</th>
                    <th>Add Property Type</th>
                    <th>Add Property Brand</th>
                    <th>Add Property Building</th>
                    <th>Add Room</th>
                    <th>Add Room Type</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="{{ route('property.create') }}" class="btn btn-info">Add Property</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-info " data-toggle="modal" data-target="#addPropertyType">Add Property
                            Type</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-info " data-toggle="modal" data-target="#addPropertyBrand">Add
                            Brand</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-info" data-toggle="modal" data-target="#addPropertyBuilding">Add

                            Building</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-success " data-toggle="modal" data-target="#addRoom">Add
                            Room</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-success " data-toggle="modal" data-target="#addRoomType">Add
                            Room Type</a>
                    </td>

                </tr>
            </tbody>

            <thead>
                <tr>
                    <th>Add Service</th>
                    <th>Add GRA </th>
                    <th>Add Inspector</th>
                    <th>Add HouseMan</th>
                    <th>Add Supervisor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="" class="btn btn-primary " data-toggle="modal" data-target="#service">Add
                            Service</a>
                    </td>
                    <td>
                        <a href="{{ route('attendant.create') }}" class="btn btn-dark ">Add GRA
                        </a>
                    </td>
                    <td>
                        <a href="" class="btn btn-secondary " data-toggle="modal" data-target="#inspector">Add
                            Inspector</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning " data-toggle="modal" data-target="#houseman">Add HouseMan</a>
                    </td>
                    <td>
                        <a href="" class="btn btn-warning " data-toggle="modal" data-target="#supervisor">Add
                            Supervisor</a>
                    </td>
                </tr>
            </tbody>

        </table>


    </div>
</div>

@endsection
