<?php

namespace App\Http\Controllers;

use App\Vet;
use App\Date;
use App\Time;
use App\User;
use DateTime;
use App\DateTime as DatetimeModel;
use App\State;
use App\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::all();
        $aux = Appointment::with('vet', 'state', 'dateTimes')->get();
  
        $date = Date::findOrFail($aux[0]['dateTimes']->date_id)->date;
        $time = Time::findOrFail($aux[0]['dateTimes']->time_id)->time;
        $dateTime = new DateTime($date . " " . $time);
        $appointments = array();
        foreach ($aux as $key => $value) {

            $vet = $value['vet']['user_id'];
            $usr = User::where('id', $vet)->first();
            $appointments[$key]['title'] = 'Dr. ' . $usr['name'] . ' ' . $usr['last_name'];
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

    public function gestionHoras() {
        $vets = Vet::with('user')->get();
        $veterinaries = array();
        foreach ($vets as $key => $vet) {
            $veterinaries[$key]['id'] = $vet->id;
            $veterinaries[$key]['name'] = $vet->user->name . ' ' . $vet->user->last_name;
        }
        return view('calendario.appointments.gestionHoras', compact('veterinaries'));
    }

    public function getApptsByVet($vet) {
        $appts = Appointment::with('dateTimes', 'state')->where('vet_id', $vet)->get();
        $events = array();
        foreach ($appts as $key => $appt) {
            $dateId = $appt->dateTimes->date_id;
            $timeId = $appt->dateTimes->time_id;
            $fecha = Date::findOrFail($dateId)->date;
            $hora = Time::findOrFail($timeId)->time;
            $events[$key]['id'] = $appt->id;
            $events[$key]['start'] = $fecha . ' ' . $hora;
            
            if($appt['state']->state === 'disponible') {

                $events[$key]['color'] = '#cccc'; //tono gris
                $events[$key]['textColor'] = 'black';
            }
            elseif ($appt['state']->state === 'reservado') {

                $events[$key]['color'] = '#17a2b8'; //Color institucional
                $events[$key]['textColor'] = 'white';
            }
            elseif ($appt['state']->state === 'confirmado') {

                $events[$key]['color'] = 'green';
                $events[$key]['textColor'] = 'white';
            }
        }

        return $events;
    }

    public function addAppointmentsByVet($vet, $fecha, $hora) {
        
        $date_id = Date::firstOrCreate(['date' => $fecha])->where('date', $fecha)->first()->id;
        $time_id = Time::firstOrCreate(['time' => $hora])->where('time', $hora)->first()->id;
        $date_time_id = DatetimeModel::firstOrCreate(['date_id' => $date_id, 'time_id' => $time_id])->where('date_id', $date_id)->where('time_id', $time_id)->first()->id;

        $checking = Appointment::where("vet_id", $vet)->where("state_id", 3)->where("date_times_id", $date_time_id)->get();

        if($checking != null) {
            return 201; //Ya existe esta búsqueda en la base de datos
        }
        else {
            Appointment::create(["vet_id" => $vet, "state_id" => 3, "date_times_id" => $date_time_id]);
            return 200;
        }
        


    }
}
