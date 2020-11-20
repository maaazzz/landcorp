@extends('admin.layouts.master')

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
<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card">
            <div class="card-header">
                Property Managment
            </div>
            <div class="card-body">
                <form action="{{route('property.store')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Property Building</label>
                                <select name="property_building_id" id="" class="form-control">
                                    <option value="" selected disabled>Select Property Building</option>
                                    @foreach ($propertyBuildings as $propertyBuilding)
                                    <option value="{{ $propertyBuilding->id }}">{{ $propertyBuilding->building_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Property Type</label>
                                <select name="property_type_id" id="" class="form-control">
                                    <option value="" selected disabled>Select Property Type</option>
                                    @foreach ($propertyTypes as $propertyType)
                                    <option value="{{ $propertyType->id }}">{{ $propertyType->property_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Add Property</label>
                                <input type="text" class="form-control" name="property_name"
                                    placeholder="Add property name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Rooms</label>
                                <input type="number" name="rooms[]" placeholder="no of rooms" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="type_clone">
                                <label for="">Select Room Type</label>
                                <select name="room_type[]" class="form-control roomType">
                                    @foreach ($roomTypes as $roomType)
                                    <option value="{{$roomType->id}}">{{ $roomType->room_type }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Property Brand</label>
                                <select name="property_brand_id" id="" class="form-control">
                                    <option value="" selected disabled>Select Property Brand</option>
                                    @foreach ($propertyBrands as $propertyBrand)
                                    <option value="{{ $propertyBrand->id }}">{{ $propertyBrand->property_brand }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="append-room">

                            </div>
                        </div>
                        <div class="append-type col-md-6">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <a href="" class="append_input">
                                <i class="fa fa-plus fa-3x mt-4">
                                </i>
                            </a>
                            <span class="text-muted">Add More Rooms</span>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('admin/property-scripts/append-form.js') }}"></script>
@endsection
