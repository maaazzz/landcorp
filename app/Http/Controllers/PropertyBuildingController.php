<?php

namespace App\Http\Controllers;

use App\Imports\PropertyBuildingImport;
use Illuminate\Http\Request;
use App\Model\PropertyBuilding;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PropertyBuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyBuildings = PropertyBuilding::where('user_id', Auth::user()->id)
            ->get();
        return view('admin.property-building-mgt.property-building-listing', compact('propertyBuildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PropertyBuilding::create([
            'user_id' => Auth::user()->id,
            'building_name' => $request->property_building,
        ]);
        return redirect()->back()->with('success', 'Property Building Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\PropertyBuilding  $propertyBuilding
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyBuilding $propertyBuilding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\PropertyBuilding  $propertyBuilding
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyBuilding $propertyBuilding)
    {
        return view('admin.property-building-mgt.edit-property-building', compact('propertyBuilding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\PropertyBuilding  $propertyBuilding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyBuilding $propertyBuilding)
    {
        $propertyBuilding->building_name = $request->building_name;
        $propertyBuilding->update();

        return redirect()
            ->route('property-building.index')
            ->with('success', 'Property building updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\PropertyBuilding  $propertyBuilding
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyBuilding $propertyBuilding)
    {
        $propertyBuilding->delete();

        return redirect()
            ->route('property-building.index')
            ->with('danger', 'Property building deleted  successfully');
    }


    public function importPropertyBuilding()
    {
        // dd(request()->all());
        Excel::import(new PropertyBuildingImport, request()->file('property_building_file'));
        return back()
            ->with('success', 'File imported successfully');
    }
}