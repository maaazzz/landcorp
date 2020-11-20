@extends('admin.layouts.master')


@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Attendant</h1>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('attendant.update',$attendant->id) }}" method="post">
                @method('put')
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">GRA First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                value="{{$attendant->first_name}}">
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">GRA Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                value="{{$attendant->last_name}}">
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Position</label>
                            <select name="position" id="" class="form-control" value="{{$attendant->position}}">
                                <option selected disabled>Select Position</option>
                                <option value="houseman">Houseman</option>
                                <option value="supervisor">Supervisor</option>
                                <option value="common_area">Common Area</option>
                                <option value="laundry">Laundry</option>
                                <option value="dispatch">Dispatch</option>
                                <option value="asst_mgr">Asst Mgr</option>
                                <option value="manager">Manager</option>
                                <option value="inspector">Inspector</option>
                                <option value="executive_house_keeper">Executive House Keeper</option>
                                <option value="assistan_housekeeper">Assisatant House Keeper</option>
                            </select>
                            @error('position')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Gender</label>
                            <select name="gender" id="" class="form-control" value="{{$attendant->gender}}">
                                <option selected disabled>Select Gender</option>
                                <option value="0" {{$attendant->gender == 0 ? 'selected' : ''}}>Male</option>
                                <option value="1" {{$attendant->gender == 1 ? 'selected' : ''}}>Female</option>
                            </select>
                            @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Address 1:</label>
                            <input type="text" class="form-control" name="address_one" placeholder="address one"
                                value="{{ $attendant->address_one }}">
                            @error('address_one')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Address 2:</label>
                            <input type="text" class="form-control" name="address_two" placeholder="Address two"
                                value="{{$attendant->address_two}}">
                            @error('address_two')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">City:</label>
                            <input type="text" class="form-control" name="city" placeholder="City"
                                value="{{ $attendant->city }}">
                            @error('city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">State</label>
                            <select name="state" id="" class="form-control" value="">
                                <option value="" disabled selected>Select State</option>
                                <option value="newyork">Newyork</option>
                                <option value="washington">Washington</option>
                            </select>
                            @error('state')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Zip/Postal Code:</label>
                            <input type="text" class="form-control" name="zip_code"
                                placeholder="Enter Zip Code Or postal Code" value="{{ $attendant->zip_code }}">
                            @error('zip_code')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Work Phone:</label>
                            <input type="text" class="form-control" name="work_phone" placeholder="Enter Work Phone"
                                value="{{ $attendant->work_phone }}">
                            @error('work_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Office Phone:</label>
                            <input type="text" class="form-control" name="office_phone" placeholder="Enter Office Phone"
                                value="{{ $attendant->office_phone }}">
                            @error('office_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cellular:</label>
                            <input type="text" class="form-control" name="cellular" placeholder="Enter Cellular Phone"
                                value="{{ $attendant->cellular }}">
                            @error('cellular')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="enter email"
                                value="{{ $attendant->email }}">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                </div>
                <input type="submit" value="Add Attendant" class="btn btn-success float-right">
                <a href="{{ route('attendant.index') }}" class="btn btn-warning float-right mr-2">Back</a>
            </form>
        </div>
    </div>
</div>

@endsection
