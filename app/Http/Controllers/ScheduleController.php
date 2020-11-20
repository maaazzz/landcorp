<?php

namespace App\Http\Controllers;


use App\Model\Room;
use App\model\Service;
use App\model\Houseman;
use App\Model\Property;
use App\Model\RoomType;
use App\model\Schedule;
use App\model\Attendant;
use App\model\Inspector;
use App\Model\PropertyType;
use App\model\PropertyBrand;
use App\Model\PropertyBuilding;
use App\model\SuperVisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $schedules = Schedule::where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('admin.schedule-mgt.schedule', compact(
            'schedules',
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user()->id;

        $properties = Property::where('user_id', $user)->get();
        $propertyTypes = PropertyType::where('user_id', $user)->get();
        $propertyBrands = PropertyBrand::where('user_id', $user)->get();
        $rooms = Room::where('user_id', $user)
            ->where('status', '<', 3)
            ->get();
        $roomTypes = RoomType::where('user_id', $user)->get();
        $services = Service::where('user_id', $user)->get();
        $attendants = Attendant::where('user_id', $user)->get();
        $inspectors = Inspector::where('user_id', $user)->get();
        $houseMans = Houseman::where('user_id', $user)->get();
        $supervisors = SuperVisor::where('user_id', $user)->get();
        $propertyBuildings = PropertyBuilding::where('user_id', $user)->get();
        return view('admin.schedule-mgt.create', compact(
            'properties',
            'propertyTypes',
            'propertyBrands',
            'rooms',
            'roomTypes',
            'services',
            'attendants',
            'inspectors',
            'houseMans',
            'supervisors',
            'propertyBuildings',
        ));
    }


    public function findRoom($room_id)
    {
        return Room::find($room_id);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->status == 1) {
            $room_id = $request->room_id;
            $room = $this->findRoom($room_id);
            $room->status = 1;
            $room->update();
        }
        if ($request->status == 2) {
            $room_id = $request->room_id;
            $room = $this->findRoom($room_id);
            $room->status = 2;
            $room->update();
        }

        if ($request->status == 3) {
            $room_id = $request->room_id;
            $room = $this->findRoom($room_id);
            $room->status = 3;
            $room->update();
        }





        $this->validate($request, [
            'property_id' => 'required',
            'property_type_id' => 'required',
            'property_brand_id' => 'required',
            'room_id' => 'required',
            'room_type_id' => 'required',
            'service_id' => 'required',
            'attendant_id' => 'required',
        ]);
        Schedule::create([
            'user_id' => Auth::user()->id,
            'property_id' => $request->property_id,
            'property_type_id' => $request->property_type_id,
            'property_brand_id' => $request->property_brand_id,
            'room_id' => $request->room_id,
            'room_type_id' => $request->room_type_id,
            'service_id' => $request->service_id,
            'attendant_id' => $request->attendant_id,
            'inspector_id' => $request->inspector_id,
            'houseman_id' => $request->houseman_id,
            'supervisor_id' => $request->supervisor_id,
            'property_building_id' => $request->property_building,
            'comments' => $request->comment,
            'status' => $request->status,
            'time_in' => $request->time_in,
            'time_out' => $request->time_out,


        ]);

        return redirect()
            ->route('schedule.index')
            ->with('success', 'Schedule added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {

        $referer = request()->headers->get('referer');
        $user = Auth::user()->id;
        $properties = Property::where('user_id', $user)->get();
        $propertyTypes = PropertyType::where('user_id', $user)->get();
        $propertyBrands = PropertyBrand::where('user_id', $user)->get();
        $rooms = Room::where('user_id', $user)->get();
        $roomTypes = RoomType::where('user_id', $user)->get();
        $services = Service::where('user_id', $user)->get();
        $attendants = Attendant::where('user_id', $user)->get();
        $inspectors = Inspector::where('user_id', $user)->get();
        $houseMans = Houseman::where('user_id', $user)->get();
        $supervisors = SuperVisor::where('user_id', $user)->get();
        $propertyBuildings = PropertyBuilding::where('user_id', $user)->get();

        return view('admin.schedule-mgt.edit', compact(
            'properties',
            'propertyTypes',
            'propertyBrands',
            'rooms',
            'roomTypes',
            'services',
            'attendants',
            'inspectors',
            'houseMans',
            'supervisors',
            'schedule',
            'propertyBuildings',
            'referer'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {

        if ($request->status == 1) {
            $room_id = $request->room_id;
            $room = $this->findRoom($room_id);
            $room->status = 1;
            $room->update();
        }
        if ($request->status == 2) {
            $room_id = $request->room_id;
            $room = $this->findRoom($room_id);
            $room->status = 2;
            $room->update();
        }

        if ($request->status == 3) {
            $room_id = $request->room_id;
            $room = $this->findRoom($room_id);
            $room->status = 3;
            $room->update();
        }

        $schedule->property_id = $request->property_id;
        $schedule->property_type_id = $request->property_type_id;
        $schedule->property_brand_id = $request->property_brand_id;
        $schedule->room_id = $request->room_id;
        $schedule->service_id = $request->service_id;
        $schedule->attendant_id = $request->attendant_id;
        $schedule->inspector_id = $request->inspector_id;
        $schedule->houseman_id = $request->houseman_id;
        $schedule->supervisor_id = $request->supervisor_id;
        $schedule->property_building_id = $request->property_building;

        $schedule->status = $request->status;
        $schedule->comments = $request->comment;
        $schedule->time_in = $request->time_in;
        $schedule->time_out = $request->time_out;

        $schedule->update();



        if (request()->referer) {
            return redirect(request()->referer)
                ->with('success', 'Schedule Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        // dd($schedule);
        $schedule->delete();
        return redirect()
            ->route('schedule.index')
            ->with('danger', 'Schedule deleted successfully');
    }

    public function calendarView()
    {
        return view('admin.schedule-mgt.schedule-calendar');
    }
    public function showCalendar()
    {
        return $this->scheduleToArray(Schedule::all());
    }
    public function scheduleToArray($schedules)
    {
        $scheduleArray = [];
        foreach ($schedules as  $schedule) {
            $data = [
                'title' => $schedule->property->name,
                'start' => $schedule->time_in,
                'end' => $schedule->time_out,
            ];
            array_push($scheduleArray, $data);
        }
        return response()->json($scheduleArray);
    }
}