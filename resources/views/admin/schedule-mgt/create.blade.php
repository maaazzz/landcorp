@extends('admin.layouts.master')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/jquery.datetimepicker.min.css">
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Schedule</h1>
</div>
<div class="card">
    <div class="card-body">

        <form action="{{ route('schedule.store') }}" method="post" id="frmAdd" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Property</label>
                        <select name="property_id" class="form-control" required>
                            <option value="" selected>Select Property</option>
                            @forelse ($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->name }}</option>
                            @empty
                            <option value="">Properties not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Property Type</label>
                        <select name="property_type_id" class="form-control" required>
                            <option value="" selected>Select Property Type</option>
                            @forelse ($propertyTypes as $propertyType)
                            <option value="{{ $propertyType->id }}">{{ $propertyType->property_type }}
                            </option>
                            @empty
                            <option value="">Property Type not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Property Brand</label>
                        <select name="property_brand_id" class="form-control" required>
                            <option value="" selected>Select Property Brand</option>
                            @forelse ($propertyBrands as $propertyBrand)
                            <option value="{{ $propertyBrand->id }}">
                                {{ $propertyBrand->property_brand }}
                            </option>
                            @empty
                            <option value="">brands not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Property Building</label>
                        <select name="property_building" class="form-control" required>
                            <option value="" selected>Select Property Brand</option>
                            @forelse ($propertyBuildings as $propertyBuilding)
                            <option value="{{ $propertyBuilding->id }}">
                                {{ $propertyBuilding->building_name }}
                            </option>
                            @empty
                            <option value="">Property Building not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Room Type</label>
                        <select name="room_type_id" class="form-control" required>
                            <option value="" selected>Select Property Type</option>
                            @forelse ($roomTypes as $roomType)
                            <option value="{{ $roomType->id }}">
                                {{ $roomType->room_type }}
                            </option>
                            @empty
                            <option value="">room type not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Service</label>
                        <select name="service_id" class="form-control" required>
                            <option value="" selected>Select Service</option>
                            @forelse ($services as $service)
                            <option value="{{ $service->id }}">
                                {{ $service->service_name }}
                            </option>
                            @empty
                            <option value="">services not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Room Status</label>
                        <select name="status" class="form-control" required>
                            <option value="" selected disabled>Select Room Status</option>
                            <option value="1">
                                Vacant - V
                            </option>
                            <option value="2">Vacant/Clean - VC</option>
                            <option value="3">Vacant/Clean/Inspection - VCI</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Guest Room Attendant</label>
                        <select name="attendant_id" class="form-control" required>
                            <option value="" selected>Select Attendant</option>
                            @forelse ($attendants as $attendant)
                            <option value="{{ $attendant->id }}">
                                {{ $attendant->first_name }}
                            </option>
                            @empty
                            <option value="">attendants not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Inspector</label>
                        <select name="inspector_id" class="form-control" required>
                            <option value="" selected>Select Inspector</option>
                            @forelse ($inspectors as $inspector)
                            <option value="{{ $inspector->id }}">
                                {{ $inspector->inspector_name }}
                            </option>
                            @empty
                            <option value="">inspectors not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Time In</label>
                        <input type="text" class="datetimepicker form-control" name="time_in" autocomplete="off"
                            required required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Time Out</label>
                        <input type="text" class="datetimepicker form-control" name="time_out" autocomplete="off"
                            required>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Add Room</label>
                        <select name="room_id" class="form-control" required>
                            <option value="" selected>Select Room</option>
                            @forelse ($rooms as $room)
                            <option value="{{ $room->id }}">
                                {{ $room->room_name }}
                            </option>
                            @empty
                            <option value="">rooms not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Houseman</label>
                        <select name="houseman_id" class="form-control" required>
                            <option value="" selected>Select Houseman</option>
                            @forelse ($houseMans as $houseMan)
                            <option value="{{ $houseMan->id }}">
                                {{ $houseMan->houseman_name }}
                            </option>
                            @empty
                            <option value="">housemans not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Supervisor</label>
                        <select name="supervisor_id" class="form-control" required>
                            <option value="" selected>Select Supervisor</option>
                            @forelse ($supervisors as $supervisor)
                            <option value="{{ $supervisor->id }}">
                                {{ $supervisor->supervisor_name }}
                            </option>
                            @empty
                            <option value="">supervisor not found</option>
                            @endforelse
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <label for="">Comments</label>
                    <textarea name="comment" id="" cols="185" rows="6" class="form-control" placeholder="Enter Comment"
                        required></textarea>
                </div>
            </div>
            <input type="submit" class="btn btn-success float-right" value="submit">
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('admin/validation/validate.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/build/jquery.datetimepicker.full.min.js">
</script>
<script>
    jQuery('.datetimepicker').datetimepicker();
</script>
@endsection
