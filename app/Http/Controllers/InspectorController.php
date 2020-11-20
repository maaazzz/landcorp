<?php

namespace App\Http\Controllers;

use App\model\Inspector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspectors = Inspector::where('user_id', Auth()->user()->id)
            ->get();
        return view('admin.inspector-mgt.inspector-listing', compact('inspectors'));
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
        Inspector::create([
            'user_id' => Auth::user()->id,
            'inspector_name' => $request->inspector_name,
        ]);

        return redirect()->back()->with('success', 'Inspector Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Inspector  $inspector
     * @return \Illuminate\Http\Response
     */
    public function show(Inspector $inspector)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Inspector  $inspector
     * @return \Illuminate\Http\Response
     */
    public function edit(Inspector $inspector)
    {
        return view('admin.inspector-mgt.edit-inspector', compact('inspector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Inspector  $inspector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inspector $inspector)
    {
        $inspector->inspector_name = $request->inspector_name;
        $inspector->update();

        return redirect()
            ->route('inspector.index')
            ->with('success', 'Inspector updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Inspector  $inspector
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inspector $inspector)
    {
        $inspector->delete();
        return redirect()
            ->route('inspector.index')
            ->with('danger', 'Inspector deleted successfully');
    }
}