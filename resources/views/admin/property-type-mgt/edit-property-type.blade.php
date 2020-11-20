@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Property Type
        </div>
        <div class="card-body">
            <form action="{{ route('property-type.update',$propertyType->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Property Type</label>
                    <input type="text" name="property_type" class="form-control"
                        value="{{ $propertyType->property_type }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('property-type.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
