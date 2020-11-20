<?php

namespace App\Http\Controllers;

use App\User;
use App\model\Attendant;
use Illuminate\Http\Request;
use App\Imports\AttendantImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AttendantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendants = Attendant::where('user_id', Auth::user()->id)
            ->latest()
            ->get();
        return view('admin.attendant-mgt.attendant-listing', compact('attendants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.attendant-mgt.create-attendant');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'position' => 'required',
            'gender' => 'required',
            'address_one' => 'required',
            'address_two' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'work_phone' => 'required',
            'office_phone' => 'required',
            'cellular' => 'required',
        ]);

        Attendant::create([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'position' => $request->position,
            'gender' => $request->gender,
            'address_one' => $request->address_one,
            'address_two' => $request->address_two,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'work_phone' => $request->work_phone,
            'office_phone' => $request->office_phone,
            'cellular' => $request->cellular,
            'email' => $request->email,
            'password' => \bcrypt($request->password),
        ]);
        User::create([
            'name' => $request->first_name,
            'email' => $request->email,
            'password' => \bcrypt($request->password),
            'type' => 0,
        ]);

        return redirect()->route('attendant.index')->with('success', 'Attendant Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\model\Attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function show(Attendant $attendant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\model\Attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendant $attendant)
    {
        return view('admin.attendant-mgt.edit-attendant', compact('attendant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\model\Attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendant $attendant)
    {
        $attendant->first_name = $request->first_name;
        $attendant->last_name = $request->last_name;
        $attendant->position = $request->position;
        $attendant->gender = $request->gender;
        $attendant->address_one = $request->address_one;
        $attendant->address_two = $request->address_two;
        $attendant->city = $request->city;
        $attendant->state = $request->state;
        $attendant->zip_code = $request->zip_code;
        $attendant->work_phone = $request->work_phone;
        $attendant->office_phone = $request->office_phone;
        $attendant->cellular = $request->cellular;
        $attendant->email = $request->email;

        $attendant->update();
        return redirect()
            ->route('attendant.index')
            ->with('success', 'Attendant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\model\Attendant  $attendant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendant $attendant)
    {
        $attendant->delete();
        return redirect()
            ->route('attendant.index')
            ->with('danger', 'Attendant deleted successfully');
    }

    public function importAttendant()
    {
        // dd(request()->all());
        Excel::import(new AttendantImport, request()->file('attendant_file'));
        // try {
        //     Excel::import(new AttendantImport, request()->file('attendant_file'));
        // } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        //     $failures = $e->failures();
        //     // dd($failures);
        //     return back()
        //         ->with('danger', 'duplicate entries not allowed');
        // }

        return back()
            ->with('success', 'File Imported successfully');
    }
}