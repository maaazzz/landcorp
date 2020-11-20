@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Room
        </div>
        <div class="card-body">
            <form action="{{ route('room.update',$room->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Room Type</label>
                    <select name="room_type_id" id="" class="form-control">
                        @foreach ($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}" {{$room->id == $roomType->id ? 'selected' : ''}}>
                            {{ $roomType->room_type }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Room</label>
                    <input type="text" name="room_name" class="form-control" value="{{ $room->room_name }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('room.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
