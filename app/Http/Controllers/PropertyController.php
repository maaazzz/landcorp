<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Room;
use App\Model\Property;
use App\Model\RoomType;
use App\Model\PropertyType;
use Illuminate\Http\Request;
use App\Imports\PropertyImport;
use App\model\PropertyBrand;
use App\Model\PropertyBuilding;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PropertyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $properties = Property::where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('admin.property-mgt.property-listing', compact(
            'properties',


        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propertyBuildings = PropertyBuilding::where('user_id', auth()->user()->id)
            ->get();
        $propertyTypes = PropertyType::where('user_id', auth()->user()->id)
            ->get();
        $roomTypes = RoomType::where('user_id', auth()->user()->id)->get();
        $propertyBrands = PropertyBrand::where('user_id', auth()->user()->id)->get();


        return view('admin.property-mgt.create-property', compact('propertyTypes', 'propertyBuildings', 'roomTypes', 'propertyBrands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $property =  Property::create([
            'user_id' => $this->userID(),
            'property_brand_id' => $request->property_brand_id,
            'property_building_id' => $request->property_building_id,
            'property_type_id' => $request->property_type_id,
            'name' => $request->property_name,
        ]);
        // dd($request->all());
        $rooms = $request->rooms;
        $roomType = $request->room_type;
        // dd($rooms);
        for ($i = 0; $i < count($rooms); $i++) {
            for ($j = 1; $j <= $rooms[$i]; $j++) {
                Room::create([
                    'user_id' => auth()->user()->id,
                    'property_id' => $property->id,
                    'room_type_id' => $roomType[$i],
                    'room_name' => $property->name . '#' . $j,
                    'status' => 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }


        return $this->redirectToPage()->with('success', 'Property added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $propertyBuildings = PropertyBuilding::where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        $propertyTypes = PropertyType::where('user_id', auth()->user()->id)
            ->latest()
            ->get();
        return view('admin.property-mgt.edit-property', compact(
            'property',
            'propertyTypes',
            'propertyBuildings',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $property->property_building_id = $request->property_building_id;
        $property->property_type_id = $request->property_type_id;
        $property->name = $request->name;
        $property->save();
        return redirect()->route('property.index')->with('success', 'Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('property.index')->with('danger', 'Property deleted successfully');
    }

    public function redirectToPage()
    {
        return redirect()->back();
    }
    public function userID()
    {
        return $id = Auth::user()->id;
    }



    // import csv
    public function importProperty()
    {
        Excel::import(new PropertyImport, request()->file('property_file'));

        return back()
            ->with('success', 'File imported successfully');
    }
}