<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use MaddHatter\LaravelFullcalendar\Calendar;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::all();
        $appointment = [];
        foreach( $appointments as $i){
            $appointment[] = \Calendar:: event(
                $i->name,
                false,
                new \DateTime($i->start_time),
                new \DateTime($i->start_time),
                $i-> id
            );
        }
        $calendar = \Calendar::addEvents($appointment);
        return view('admin.content.appointment.index',compact('appointments','calendar'));
    }

    public function publicCalander()
    {
        $appointments = Appointment::all();
        $appointment = [];
        foreach( $appointments as $i){
            $appointment[] = \Calendar:: event(
                $i->name,
                false,
                new \DateTime($i->start_time),
                new \DateTime($i->start_time),
                $i-> id
            );
        }
        $calendar = \Calendar::addEvents($appointment);
        return view('manager.index',compact('appointments','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.appointment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = \request()->validate([
            'name' => 'required',
            'topic' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
        ]);


        Appointment::create($inputs);
        session()->flash('create', 'Data Created Successfully');
        return redirect()->route('appointment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $appointments = Appointment::all();
        return view('admin.content.appointment.edit',compact('appointments'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    public function edit(Appointment $appointment)
    {
        return view('admin.content.appointment.update',compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Appointment $appointment)
    {
        $inputs = \request()->validate([
            'name' => 'required',
            'topic' => 'required',
            'duration' => 'required',
            'start_time' => 'required',
            'status' => '',
        ]);

        $appointment->update($inputs);
        session()->flash('create', 'Data Updated Successfully');
        return redirect()->route('appointment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        session()->flash('delete', 'Appointment Deleted Successfully');
        return redirect()->route("appointment.index");
    }
}
