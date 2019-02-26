<?php

namespace App\Http\Controllers;

use App\Date;
use App\Time;
use App\State;
use App\Vet;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DateTime;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('calendario.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vets = Vet::all();
        return view('calendario.appointments.create', compact('vets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {

        $veterinary = Vet::findOrFail($appointment->veterinary_id);
        // return compact('appointment', 'veterinary');
        return view('calendario.appointments.show', compact('appointment', 'veterinary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $data = Appointment::with('vet', 'state')->findOrFail($appointment->id);
        return $data;
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
        Appointment::findOrFail($appointment->id)->update($request->all());
        return back();
        // return $appointment;
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function calendar() {

        $states = State::all();
        $aux = Appointment::with('vet', 'state', 'dateTimes')->get();
        // return Date::findOrFail($aux[0]['dateTimes']->date_id);
        // return Time::findOrFail($aux[0]['dateTimes']->time_id);

        $date = Date::findOrFail($aux[0]['dateTimes']->date_id)->date;
        $time = Time::findOrFail($aux[0]['dateTimes']->time_id)->time;
        $dateTime = new DateTime($date . " " . $time);

        $appointments = array();
        foreach ($aux as $key => $value) {
            $appointments[$key]['title'] = $value['name'];
            $appointments[$key]['id'] = $value['id'];

            $date = Date::findOrFail($value['dateTimes']->date_id)->date;
            $time = Time::findOrFail($value['dateTimes']->time_id)->time;
            $dateTime = new DateTime($date . " " . $time);

            $appointments[$key]['start'] = $dateTime->format('Y-m-d H:i:s');

            if($value['state']->state === 'disponible') {

                $appointments[$key]['color'] = '#cccc'; //tono gris
                $appointments[$key]['textColor'] = 'black';

            }
            elseif ($value['state']->state === 'reservado') {

                $appointments[$key]['color'] = '#17a2b8'; //Color institucional
                $appointments[$key]['textColor'] = 'white';

            }
            elseif ($value['state']->state === 'confirmado') {

                $appointments[$key]['color'] = 'green';
                $appointments[$key]['textColor'] = 'white';

            }
        }
        return view('calendario.appointments.calendar', compact('appointments', 'states'));
    }
}
