@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Inspector
        </div>
        <div class="card-body">
            <form action="{{ route('inspector.update',$inspector->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Inspector</label>
                    <input type="text" name="inspector_name" class="form-control"
                        value="{{ $inspector->inspector_name }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('inspector.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
