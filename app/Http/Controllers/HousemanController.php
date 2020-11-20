<?php

namespace App\Http\Controllers;

use App\model\Houseman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HousemanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $housemans = Houseman::where('user_id', Auth::user()->id)
            ->get();
        return view('admin.houseman-mgt.houseman-listing', compact('housemans'));
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
        Houseman::create([
            'user_id' => Auth::user()->id,
            'houseman_name' => $request->houseman_name,
        ]);
        return redirect()->back()->with('success', 'HouseMan Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Houseman  $houseman
     * @return \Illuminate\Http\Response
     */
    public function show(Houseman $houseman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Houseman  $houseman
     * @return \Illuminate\Http\Response
     */
    public function edit(Houseman $houseman)
    {
        return view('admin.houseman-mgt.edit-houseman', compact('houseman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Houseman  $houseman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Houseman $houseman)
    {
        $houseman->houseman_name = $request->houseman_name;

        $houseman->update();
        return redirect()
            ->route('houseman.index')
            ->with('success', 'HouseMan update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Houseman  $houseman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Houseman $houseman)
    {

        $houseman->delete();
        return redirect()
            ->route('houseman.index')
            ->with('danger', 'HouseMan deleted successfully');
    }
}