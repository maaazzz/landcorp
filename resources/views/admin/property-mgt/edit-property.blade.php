@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Property
        </div>
        <div class="card-body">
            <form action="{{ route('property.update',$property->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Select Property Building</label>
                    <select name="property_building_id" id="" class="form-control">
                        <option value="" selected disabled>Select Property Building</option>
                        @foreach ($propertyBuildings as $propertyBuilding)
                        <option value="{{ $propertyBuilding->id }}"
                            {{$propertyBuilding->id == $property->propertyBuilding->id ? 'selected' : '' }}>
                            {{ $propertyBuilding->building_name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Select Property Type</label>
                    <select name="property_type_id" id="" class="form-control">
                        <option value="" selected disabled>Select Property Type</option>
                        @foreach ($propertyTypes as $propertyType)
                        <option value="{{ $propertyType->id }}"
                            {{$propertyType->id == $property->propertyType->id ? 'selected' : '' }}>
                            {{ $propertyType->property_type }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Property Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $property->name }}">
                </div>
                <input type="submit" class="btn btn-success float-right">
                <a href="{{ route('property.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
