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

        // dd($request->all());
        // $this->validate($request, [
        //     'time_in' => 'required|date_format:H:i',
        //     'time_out' => 'date_format:H:i',
        // ]);
        // dd($request->all());
        foreach ($request->room_id as $key => $roomId) {
            Dispatch::updateOrCreate([
                'date' => $request->date, // maybe it's only one date, I don't know
                'room_id' => $roomId,
            ], [
                'user_id' => auth()->id(),
                'property_id' => $request->property_id,
                'brand_id' => $request->brand_id[$key],
                'property_building_id' => $request->porperty_building_id[$key],
                'room_type_id' => 1,
                'service_id' => $request->service_id[$key],
                'status' => $request->status[$key],
                'attendant_id' => $request->attendant_id[$key],
                'attendant_id_two' => $request->attendant_two_id[$key],
                'time_in' => $request->time_in[$key],
                'time_out' => $request->time_out[$key],
                'supervisor_id' => $request->supervisor_id[$key],
                'add_room' => $request->add_room[$key],
                'houseman_id' => $request->houseman_id[$key],
                'comments' => $request->comments[$key],
                'total_time' => Carbon::parse($request->time_in[$key])->DiffInHours($request->time_out[$key]),
                'budget_time' => 1,
                'variance' => 1,
            ]);
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