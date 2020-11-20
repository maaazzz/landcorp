<?php

namespace App\Http\Controllers;

use App\Imports\PropertyTypeImport;
use App\Model\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propertyTypes = PropertyType::where('user_id', Auth::user()->id)->get();
        return view('admin.property-type-mgt.property-type-listing', compact('propertyTypes'));
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
        PropertyType::create([
            'user_id' => Auth::user()->id,
            'property_type' => $request->property_type,
        ]);
        return redirect()->back()->with('success', 'Property Type added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyType $propertyType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyType $propertyType)
    {
        return view('admin.property-type-mgt.edit-property-type', compact('propertyType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyType $propertyType)
    {
        $propertyType->property_type = $request->property_type;
        $propertyType->save();
        return redirect(route('property-type.index'))->with('success', 'Property Type updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PropertyType  $propertyType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyType $propertyType)
    {
        $propertyType->delete();
        return redirect(route('property-type.index'))->with('danger', 'Property Type Deleted Successfully');
    }

    public function importPropertyType()
    {
        // dd(request()->property_type_file);
        Excel::import(new PropertyTypeImport, request()->file('property_type_file'));
        return back()
            ->with('success', 'File imported successfully');
    }
}