<?php

namespace App\Http\Controllers;

use App\Imports\RoomImport;
use App\Model\Room;
use App\Model\Property;
use App\Model\RoomType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class RoomController extends Controller
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
        $rooms = Room::where('user_id', Auth::user()->id)
            ->get();
        $properties = Property::where('user_id', Auth::user()->id)
            ->get();
        return view('admin.room-mgt.room-listing', compact('rooms', 'roomTypes', 'properties'));
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
        Room::create([
            'user_id' => Auth::user()->id,
            'property_id' => $request->property_id,
            'room_type_id' => $request->room_type_id,
            'room_name' => $request->room_name,
            'status' => 1,
        ]);
        return redirect()
            ->back()
            ->with('success', 'Room Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $roomTypes = RoomType::where('user_id', Auth::user()->id)
            ->get();
        return view('admin.room-mgt.edit-room', compact('room', 'roomTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $room->room_type_id = $request->room_type_id;
        $room->room_name = $request->room_name;

        $room->update();
        return redirect()
            ->route('room.index')
            ->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()
            ->route('room.index')
            ->with('danger', 'Room deleted successfully');
    }



    public function importRoom()
    {
        // dd(request()->all());
        Excel::import(new RoomImport, request()->file('room_file'));
        return back()->with('success', 'Room imported successfully');
    }
}