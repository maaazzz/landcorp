@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Property Brand
        </div>
        <div class="card-body">
            <form action="{{ route('property-brand.update',$propertyBrand->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Property Type</label>
                    <input type="text" name="property_brand" class="form-control"
                        value="{{ $propertyBrand->property_brand }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('property-brand.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
