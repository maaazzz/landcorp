<?php

namespace App\Http\Controllers;

use App\Imports\RoomTypeImport;
use App\Model\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomTypes = RoomType::where('user_id', Auth::user()->id)
            ->get();

        return view('admin.room-type-mgt.room-type-list', compact('roomTypes'));
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
        RoomType::create([
            'user_id' => Auth::user()->id,
            'room_type' => $request->room_type,
        ]);
        return redirect()->back()->with('success', 'Room Type Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit(RoomType $roomType)
    {
        return view('admin.room-type-mgt.edit-room-type', compact('roomType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoomType $roomType)
    {
        $roomType->room_type = $request->room_type;
        $roomType->update();

        return redirect()
            ->route('room-type.index')
            ->with('success', 'Room type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return redirect()
            ->route('room-type.index')
            ->with('danger', 'Room type deleted successfully');
    }



    public function importRoomType()
    {
        Excel::import(new RoomTypeImport, request()->file('room_type_file'));
        return back()->with('success', 'Room type imported successfully');
    }
}