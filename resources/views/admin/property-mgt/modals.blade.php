{{-- Add Property Modal --}}
<div class="modal fade" id="addProperty" tabindex="-1" role="dialog" aria-labelledby="addProperty" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Select Property Building</label>
                        <select name="property_building_id" id="" class="form-control">
                            <option value="" selected disabled>Select Property Building</option>
                            @foreach ($propertyBuildings as $propertyBuilding)
                            <option value="{{ $propertyBuilding->id }}">{{ $propertyBuilding->building_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Select Property Type</label>
                        <select name="property_type_id" id="" class="form-control">
                            <option value="" selected disabled>Select Property Type</option>
                            @foreach ($propertyTypes as $propertyType)
                            <option value="{{ $propertyType->id }}">{{ $propertyType->property_type }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Add Property</label>
                        <input type="text" class="form-control" name="property_name" placeholder="Add property name">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- end of add property --}}

{{-- Add property Type --}}
<div class="modal fade" id="addPropertyType" tabindex="-1" role="dialog" aria-labelledby="addPropertyType"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property-type.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Type</label>
                        <input type="text" class="form-control" name="property_type" placeholder="Add property Type">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property Type</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add property Type --}}

{{-- Add property brand --}}
<div class="modal fade" id="addPropertyBrand" tabindex="-1" role="dialog" aria-labelledby="addPropertyBrand"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property-brand.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Brand</label>
                        <input type="text" class="form-control" name="property_brand" placeholder="Add property brand">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property brand</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add property brand --}}

{{-- Add property Building --}}
<div class="modal fade" id="addPropertyBuilding" tabindex="-1" role="dialog" aria-labelledby="addPropertyBuilding"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Property Building</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('property-building.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Property Building</label>
                        <input type="text" class="form-control" name="property_building"
                            placeholder="Add property building">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Property Building</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add Property Building --}}

{{-- Add Room --}}
<div class="modal fade" id="addRoom" tabindex="-1" role="dialog" aria-labelledby="addRoom" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('room.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Room</label>
                        <input type="text" class="form-control" name="room_name" placeholder="Add Room">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Room</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Add Room --}}




{{-- Add Room Type --}}
<div class="modal fade" id="addRoomType" tabindex="-1" role="dialog" aria-labelledby="addRoomType" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('room-type.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Add Room Type</label>
                        <input type="text" class="form-control" name="room_type" placeholder="Add Room Type">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Room Type</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Room Type --}}

{{-- Add Service --}}
<div class="modal fade" id="service" tabindex="-1" role="dialog" aria-labelledby="service" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Service</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('service.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Service Name</label>
                        <input type="text" class="form-control" name="service_name" placeholder="Add Service">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Service</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End Service --}}



{{-- Add inspector --}}
<div class="modal fade" id="inspector" tabindex="-1" role="dialog" aria-labelledby="inspector" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inspector</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('inspector.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Inspector Name</label>
                        <input type="text" class="form-control" name="inspector_name" placeholder="Inspector Name">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add inspector</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End inspector --}}

{{-- Add houseman --}}
<div class="modal fade" id="houseman" tabindex="-1" role="dialog" aria-labelledby="houseman" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Houseman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('houseman.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Houseman Name</label>
                        <input type="text" class="form-control" name="houseman_name" placeholder="houseman Name">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Houseman</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End houseman --}}

{{-- Add supervisor --}}
<div class="modal fade" id="supervisor" tabindex="-1" role="dialog" aria-labelledby="supervisor" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Supervisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('supervisor.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Supervisor Name</label>
                        <input type="text" class="form-control" name="supervisor_name" placeholder="Supervisor Name">
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Add Supervisor</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- End supervisor --}}
