<?php

namespace App\Http\Controllers;

use App\model\Attendant;
use App\model\Houseman;
use App\Model\Property;
use App\Model\Room;
use App\model\Service;
use App\model\SuperVisor;
use App\Model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $properties = Property::where('user_id', Auth::user()->id)
            ->get();
        return view('admin.transactions-mgt.transaction', compact('properties'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $room_id = $request->room_id;
        $room_name = $request->room_name;
        $room_type_id = $request->room_type_id;
        $property_id = $request->property_id;
        $user_id = $request->user_id;
        $services = $request->services;
        $status = $request->status;
        $attendants = $request->attendants;
        $time_in = $request->time_in;
        $time_out = $request->time_out;


        for ($i = 0; $i < count($room_id); $i++) {

            $transactions = Transaction::create(
                [
                    'user_id' => $user_id[$i],
                    'room_id' => $room_id[$i],
                    'property_id' => $property_id[$i],
                    'attendant_id' => $attendants[$i],
                    'room_name' => $room_name[$i],
                    'room_type' => $room_type_id[$i],
                    'property_name' => $property_id[$i],
                    'service_id' => $services[$i],
                    'time_in' => date('Y-m-d H:i:s ', strtotime($time_in[$i])),
                    'time_out' => date('Y-m-d H:i:s ', strtotime($time_out[$i])),
                ]
            );

            $roomID = Room::where('id', $room_id[$i])->first();
            $roomID->status = $status[$i];
            $roomID->save();
        }

        return back()
            ->with('success', 'Inserted Succesfully');
    }

    public function getProperties($id)
    {
        $room = Room::all();
        // dd($room);
        $supervisors = SuperVisor::all();
        $housemans = Houseman::all();
        $rooms = Room::with('roomType', 'property')->where('property_id', $id)->get();
        $services = Service::where('user_id', auth()->user()->id)->get();
        $attendants = Attendant::where('user_id', auth()->user()->id)->get();
        return response()->json(array('success' => true, 'html' => $rooms, 'services' => $services, 'attendants' => $attendants, 'room' => $room, 'houseman' => $housemans, 'supervisors' => $supervisors));
        // dd($rooms);
    }

    public function transactionListing()
    {
        $transactions = Transaction::all();
        return view('admin.transactions-mgt.transaction-listing', compact('transactions'));
    }
}