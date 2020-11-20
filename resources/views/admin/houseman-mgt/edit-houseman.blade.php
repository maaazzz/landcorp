@extends('admin.layouts.master')


@section('content')
<div class="col-md-5 offset-md-3">
    <div class="card">
        <div class="card-header">
            Edit Houseman
        </div>
        <div class="card-body">
            <form action="{{ route('houseman.update',$houseman->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Houseman</label>
                    <input type="text" name="houseman_name" class="form-control" value="{{ $houseman->houseman_name }}">
                </div>
                <input type="submit" class="btn btn-success float-right" value="Update">
                <a href="{{ route('houseman.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
