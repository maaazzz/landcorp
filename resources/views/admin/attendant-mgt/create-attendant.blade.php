@extends('admin.layouts.master')

@section('styles')
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/jquery.datetimepicker.min.css"> --}}
@endsection
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Add Attendant</h1>
</div>
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('attendant.store') }}" method="post" id="frmAdd" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">GRA First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                value="{{old('first_name')}}" required>
                            @error('first_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">GRA Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                value="{{old('last_name')}}" required>
                            @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Position</label>
                            <select name="position" id="" class="form-control" required value="{{old('position')}}">
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
                            <select name="gender" id="" class="form-control" value="{{old('gender')}}" required>
                                <option selected disabled>Select Gender</option>
                                <option value="0">Male</option>
                                <option value="1">Female</option>
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
                                value="{{old('address_one')}}" required>
                            @error('address_one')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Address 2:</label>
                            <input type="text" class="form-control" name="address_two" placeholder="Address two"
                                value="{{old('address_two')}}" required>
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
                                value="{{old('city')}}" required>
                            @error('city')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">State</label>
                            <select name="state" id="" class="form-control" value="{{old('state')}}" required>
                                <option value="" disabled selected>Select State</option>
                                <option value="AL">Alabama</option>
                                <option value="AK">Alaska</option>
                                <option value="AZ">Arizona</option>
                                <option value="AR">Arkansas</option>
                                <option value="CA">California</option>
                                <option value="CO">Colorado</option>
                                <option value="CT">Connecticut</option>
                                <option value="DE">Delaware</option>
                                <option value="DC">District Of Columbia</option>
                                <option value="FL">Florida</option>
                                <option value="GA">Georgia</option>
                                <option value="HI">Hawaii</option>
                                <option value="ID">Idaho</option>
                                <option value="IL">Illinois</option>
                                <option value="IN">Indiana</option>
                                <option value="IA">Iowa</option>
                                <option value="KS">Kansas</option>
                                <option value="KY">Kentucky</option>
                                <option value="LA">Louisiana</option>
                                <option value="ME">Maine</option>
                                <option value="MD">Maryland</option>
                                <option value="MA">Massachusetts</option>
                                <option value="MI">Michigan</option>
                                <option value="MN">Minnesota</option>
                                <option value="MS">Mississippi</option>
                                <option value="MO">Missouri</option>
                                <option value="MT">Montana</option>
                                <option value="NE">Nebraska</option>
                                <option value="NV">Nevada</option>
                                <option value="NH">New Hampshire</option>
                                <option value="NJ">New Jersey</option>
                                <option value="NM">New Mexico</option>
                                <option value="NY">New York</option>
                                <option value="NC">North Carolina</option>
                                <option value="ND">North Dakota</option>
                                <option value="OH">Ohio</option>
                                <option value="OK">Oklahoma</option>
                                <option value="OR">Oregon</option>
                                <option value="PA">Pennsylvania</option>
                                <option value="RI">Rhode Island</option>
                                <option value="SC">South Carolina</option>
                                <option value="SD">South Dakota</option>
                                <option value="TN">Tennessee</option>
                                <option value="TX">Texas</option>
                                <option value="UT">Utah</option>
                                <option value="VT">Vermont</option>
                                <option value="VA">Virginia</option>
                                <option value="WA">Washington</option>
                                <option value="WV">West Virginia</option>
                                <option value="WI">Wisconsin</option>
                                <option value="WY">Wyoming</option>
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
                                placeholder="Enter Zip Code Or postal Code" value="{{old('zip_code')}}" required>
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
                                value="{{old('work_phone')}}" required>
                            @error('work_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Office Phone:</label>
                            <input type="text" class="form-control" name="office_phone" placeholder="Enter Office Phone"
                                value="{{old('office_phone')}}" required>
                            @error('office_phone')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Cellular:</label>
                            <input type="text" class="form-control" name="cellular" placeholder="Enter Cellular Phone"
                                value="{{old('cellular')}}" required>
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
                                value="{{old('email')}}" required autocomplete="off">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Password:</label>
                            <input type="password" class="form-control" name="password" placeholder="enter Password"
                                required autocomplete="off">
                            @error('password')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Confirm Password:</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                placeholder="Confirm Password" required autocomplete="off">
                            @error('password_confirmation')
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

@section('scripts')
<script src="{{ asset('admin/validation/validate.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery-datetimepicker@2.5.21/build/jquery.datetimepicker.full.min.js">
</script>
<script>
    jQuery('.datetimepicker').datetimepicker();
</script> --}}
@endsection
