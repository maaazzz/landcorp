@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Service
        </div>
        <div class="card-body">
            <form action="{{ route('service.update',$service->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Service Name</label>
                    <input type="text" name="service_name" class="form-control" value="{{ $service->service_name }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('service.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
