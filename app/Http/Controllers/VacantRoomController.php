<?php

namespace App\Http\Controllers;

use App\Model\Property;
use App\model\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VacantRoomController extends Controller
{
    public function index()
    {
        // vRooms = VacantRooms , vcRooms = Vacant and clean rooms, vci = Vacant , clean and inspected
        $vRooms = $this->whereStatus(1);
        $vcRooms = $this->whereStatus(2);
        $vciRooms = $this->whereStatus(3);
        $scores = Schedule::where('comments', '!=', null)
            ->where('status', '=', 3)
            ->latest()
            ->get();
        $properties = Property::where('user_id', Auth::user()->id)
            ->get();
        // dd($vRooms);
        return view('admin.vacant-room-mgt.vacant-room', compact(
            'vRooms',
            'vcRooms',
            'vciRooms',
            'scores',
            'properties'
        ));
    }

    // get Rooms status
    public function whereStatus($i)
    {
        return Schedule::where('status', $i)
            ->latest()
            ->get();
    }

    // filter by Property
    public function filterByProperty(Request $request)
    {
        $properties = Property::where('user_id', Auth::user()->id)
            ->get();
        $filterProperties = Schedule::where('property_id', $request->property)
            ->where('status', 1)
            ->get();
        $filterVc = Schedule::where('property_id', $request->property)
            ->where('status', 2)
            ->get();
        $filterVci = Schedule::where('property_id', $request->property)
            ->where('status', 3)
            ->get();
        // dd($filterProperty);
        return view('admin.vacant-room-mgt.filter-room', compact(
            'filterProperties',
            'properties',
            'filterVc',
            'filterVci',
        ));
    }
}