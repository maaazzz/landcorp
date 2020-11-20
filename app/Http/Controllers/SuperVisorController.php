<?php

namespace App\Http\Controllers;

use App\model\SuperVisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperVisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supervisors = SuperVisor::where('user_id', Auth::user()->id)
            ->get();

        return view('admin.supervisor-mgt.supervisor-listing', compact('supervisors'));
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
        SuperVisor::create([
            'user_id' => Auth::user()->id,
            'supervisor_name' => $request->supervisor_name,
        ]);
        return redirect()->back()->with('success', 'HouseMan Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\SuperVisor  $superVisor
     * @return \Illuminate\Http\Response
     */
    public function show(SuperVisor $superVisor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\SuperVisor  $superVisor
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperVisor $supervisor)
    {
        return view('admin.supervisor-mgt.edit-supervisor', compact('supervisor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\SuperVisor  $superVisor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SuperVisor $supervisor)
    {
        $supervisor->supervisor_name = $request->supervisor_name;
        $supervisor->update();
        return redirect()
            ->route('supervisor.index')
            ->with('success', 'supervisor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\SuperVisor  $superVisor
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperVisor $supervisor)
    {
        $supervisor->delete();
        return redirect()
            ->route('supervisor.index')
            ->with('danger', 'supervisor deleted successfully');
    }
}