<?php

namespace App\Http\Controllers;

use App\Imports\PropertyBrandImport;
use App\model\PropertyBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PropertyBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = PropertyBrand::where('user_id', Auth::user()->id)
            ->get();
        return view('admin.property-brand-mgt.property-brand-listing', compact('brands'));
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
        PropertyBrand::create([
            'user_id' => Auth::user()->id,
            'property_brand' => $request->property_brand,
        ]);
        return redirect()->back()->with('success', 'Property Brand Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\PropertyBrand  $propertyBrand
     * @return \Illuminate\Http\Response
     */
    public function show(PropertyBrand $propertyBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\PropertyBrand  $propertyBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(PropertyBrand $propertyBrand)
    {
        return view('admin.property-brand-mgt.edit-property-brand', compact('propertyBrand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\PropertyBrand  $propertyBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PropertyBrand $propertyBrand)
    {
        $propertyBrand->property_brand = $request->property_brand;
        $propertyBrand->save();

        return redirect()->route('property-brand.index')->with('success', 'Property Brand Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\PropertyBrand  $propertyBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(PropertyBrand $propertyBrand)
    {
        $propertyBrand->delete();
        return redirect()
            ->route('property-brand.index')
            ->with('danger', 'Property Brand Deleted Successfully');
    }

    public function importPropertyBrand()
    {
        // dd(request()->property_brand_file);

        Excel::import(new PropertyBrandImport, request()->file('property_brand_file'));
        return back()->with('success', 'File Uploaded Successfully');
    }
}