@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Room Type
        </div>
        <div class="card-body">
            <form action="{{ route('room-type.update',$roomType->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Room Type</label>
                    <input type="text" name="room_type" class="form-control" value="{{ $roomType->room_type }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('room-type.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
