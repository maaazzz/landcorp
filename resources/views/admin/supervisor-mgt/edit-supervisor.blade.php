@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Supervisor
        </div>
        <div class="card-body">
            <form action="{{ route('supervisor.update',$supervisor->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Supervisor</label>
                    <input type="text" name="supervisor_name" class="form-control"
                        value="{{ $supervisor->supervisor_name }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('supervisor.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
