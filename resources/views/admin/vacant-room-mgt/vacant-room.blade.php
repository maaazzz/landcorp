@extends('admin.layouts.master')

@section('styles')
<link href="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

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





<h2>Room Status Details</h2>
<br>
<!-- Nav tabs -->
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#home">Vacant <span class="badge badge-info">
                {{ count($vRooms ) }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu1">Cleaned <span class="badge badge-info">
                {{ count($vcRooms) }} </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu2">Inspected <span class="badge badge-info">
                {{ count($vciRooms) }}
            </span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#menu3">Score <span class="badge badge-info">
                {{ count($scores) }}
            </span>
        </a>
    </li>
</ul>

<!-- Tabs -->
<div class="tab-content">
    <div id="home" class=" tab-pane active"><br>
        <h3>Vacant</h3>
        <form action="{{ route('room.filter')}}">

            <div class="row">
                <div class="col-lg-4 offset-md-8">
                    <label for="">Filter</label>
                    <div class="form-group d-flex ">

                        <select name="property" id="" class="form-control">
                            <option value="" disabled>Select Property</option>
                            @foreach ($properties as $property)
                            <option value="{{$property->id}}">{{ $property->name }}</option>
                            @endforeach
                        </select>
                        <input type="submit" value="apply" class="btn btn-sm btn-primary ml-1 float-right ">
                    </div>
                </div>

            </div>

        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Service Type</th>
                    <th>GRA</th>
                    <th>Inspetor</th>
                    <th>Supervisor</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach ($vRooms as $vRoom)
                    <tr>
                        <td>{{$vRoom->id}}</td>

                        <td>{{$vRoom->roomType->room_type ?? ''}}</td>
                        <td>{{$vRoom->service->service_name ?? ''}}</td>
                        <td>{{$vRoom->attendant->first_name ?? ''}}</td>
                        <td>{{$vRoom->inspector->inspector_name ?? ''}}</td>
                        <td>{{$vRoom->supervisor->supervisor_name ?? ''}}</td>
                        <td>
                            <a href="{{ route('schedule.edit',$vRoom->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="menu1" class=" tab-pane fade"><br>
        <h3>Cleaned</h3>
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Service Type</th>
                    <th>GRA</th>
                    <th>Inspetor</th>
                    <th>Supervisor</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @forelse ($vcRooms as $vcRoom)
                    <tr>
                        <td>{{$vcRoom->id}}</td>
                        <td>{{$vcRoom->roomType->room_type ?? ''}}</td>
                        <td>{{$vcRoom->service->service_name ?? ''}}</td>
                        <td>{{$vcRoom->attendant->first_name ?? ''}}</td>
                        <td>{{$vcRoom->inspector->inspector_name ?? ''}}</td>
                        <td>{{$vcRoom->supervisor->supervisor_name ?? ''}}</td>
                        <td>
                            <a href="{{ route('schedule.edit',$vcRoom->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div id="menu2" class=" tab-pane fade"><br>
        <h3>Inspected</h3>
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>ID</th>
                    <th>Room Type</th>
                    <th>Service Type</th>
                    <th>GRA</th>
                    <th>Inspetor</th>
                    <th>Supervisor</th>
                    <th>Action</th>
                </thead>

                <tbody>
                    @foreach ($vciRooms as $vciRoom)
                    <tr>
                        <td>{{$vciRoom->id}}</td>
                        <td>{{$vciRoom->roomType->room_type ?? ''}}</td>
                        <td>{{$vciRoom->service->service_name ?? ''}}</td>
                        <td>{{$vciRoom->attendant->first_name ?? ''}}</td>
                        <td>{{$vciRoom->inspector->inspector_name ?? ''}}</td>
                        <td>{{$vciRoom->supervisor->supervisor_name ?? ''}}</td>
                        <td>
                            <a href="{{ route('schedule.edit',$vciRoom->id) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div id="menu3" class=" tab-pane fade"><br>
        <h3>Score</h3>
        <div class="table-responsive">
            <table class="table table-bordered dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>ID</th>
                    <th>Room Name</th>
                    <th>GRA</th>
                    <th>Inspector</th>
                    <th>Comments</th>
                </thead>

                <tbody>
                    @foreach ($scores as $score)
                    <tr>
                        <td>{{$score->id}}</td>
                        <td>{{$score->room->room_name}}</td>
                        <td>{{$score->attendant->first_name}}</td>
                        <td>{{$score->inspector->inspector_name}}</td>
                        <td>{{$score->comments}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>






@endsection

@section('scripts')
<script src="{{asset('admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('admin/js/demo/datatables-demo.js')}}"></script>
@endsection
