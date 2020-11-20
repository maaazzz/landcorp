<?php

namespace App\Http\Controllers;

use App\Imports\ServiceImport;
use App\model\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('user_id', Auth::user()->id)
            ->get();

        return view('admin.service-mgt.service-listing', compact('services'));
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
        Service::create([
            'user_id' => Auth::user()->id,
            'service_name' => $request->service_name,
        ]);
        return redirect()->back()->with('success', 'service added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('admin.service-mgt.edit-service', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $service->service_name = $request->service_name;

        $service->update();
        return redirect()
            ->route('service.index')
            ->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()
            ->route('service.index')
            ->with('danger', 'Service deleted successfully');
    }


    public function importService()
    {
        // dd(request()->all());
        Excel::import(new ServiceImport, request()->file('service_file'));
        return back()
            ->with('success', 'File Imported Successfully');
    }
}