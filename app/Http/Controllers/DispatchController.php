<?php

namespace App\Http\Controllers;

use App\Model\Room;
use App\Model\Service;
use App\Model\Dispatch;
use App\Model\Houseman;
use App\Model\Property;
use App\Model\Attendant;
use App\Model\SuperVisor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class DispatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $properties = Property::where('user_id', auth()->user()->id)
            ->get();
        return view('admin.dispatch-mgt.dispatch', compact('properties'));
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

        $this->validate($request, [
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'date_format:H:i',
        ]);
        // dd($request->all());
        $property_id = $request->property_id;
        $brand_id = $request->brand_id;
        $date = $request->date;
        $property_building_id = $request->porperty_building_id;
        $room_type_id = $request->room_type_id;
        $room_id = $request->room_id;
        $service = $request->service_id;
        $status = $request->status;
        $attendants = $request->attendant_id;
        $attendant_two = $request->attendant_two_id;
        $time_in = $request->time_in;
        $time_out = $request->time_out;
        $supervisor = $request->supervisor_id;
        $add_room = $request->add_room;
        $houseman = $request->houseman_id;
        $comments = $request->comments;
        $total_hrs = $time_in;
        $budgeting_hrs = 1;
        $variance = 1;



        for ($i = 0; $i < count($room_id); $i++) {
            Dispatch::updateOrCreate(
                [
                    'date' => $date,
                    'room_id' => $room_id,
                ],
                [
                    'user_id' => auth()->id(),
                    'date' =>  $date,
                    'property_id' => $property_id[$i],
                    'brand_id' => $brand_id[$i],
                    'property_building_id' => $property_building_id[$i],
                    'room_type_id' => $room_type_id[$i],
                    'room_id' => $room_id[$i],
                    'service_id' => $service[$i],
                    'status' => $status[$i],
                    'attendant_id' => $attendants[$i],
                    'attendant_id_two' => $attendant_two[$i],
                    'time_in' => $time_in[$i],
                    'time_out' => $time_out[$i],
                    'supervisor_id' => $supervisor[$i],
                    'add_room' => $add_room[$i],
                    'houseman_id' => $houseman[$i],
                    'comments' => $comments[$i],
                    'total_time' => $total_hrs[$i],
                    'budget_time' => 1,
                    'variance' => 1,
                ]
            );
        }
        return redirect()
            ->back()->with('success', 'dispatch successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function show(Dispatch $dispatch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function edit(Dispatch $dispatch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispatch $dispatch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Dispatch  $dispatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispatch $dispatch)
    {
        //
    }

    public function getProperties(Request $request, $id)
    {
        $room = Room::all();
        $date = $request->data;

        $dispatchs = Dispatch::where('date', $date)->get();
        // dd($dispatchs);
        $supervisors = SuperVisor::all();
        $housemans = Houseman::all();
        $rooms = Room::with('roomType', 'property')->where('property_id', $id)->get();
        $services = Service::where('user_id', auth()->user()->id)->get();
        $attendants = Attendant::where('user_id', auth()->user()->id)->get();
        return response()->json(array('success' => true, 'html' => $rooms, 'services' => $services, 'attendants' => $attendants, 'rooms' => $rooms, 'housemans' => $housemans, 'supervisors' => $supervisors, 'dispatchs' => $dispatchs));
        // dd($rooms);
    }
}